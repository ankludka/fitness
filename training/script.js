loadDay();

let day = {};

function loadDay(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "https://anklu.pl/fitness/training/loadExercise.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
    let response;
    xhr.addEventListener('load', function() {
        if (this.status === 200) {
            console.log(this.responseText);
            day = JSON.parse(this.responseText);
            console.log(day);
            populateExerciseGrid(JSON.parse(this.responseText));
        }
        else{
            console.log(this.status);
        }
    });
}


function populateExerciseGrid(exerciseList){
    let grid = document.getElementById('grid-container');
    exerciseList.forEach(exercise => {
        grid.appendChild(CreateAndPopulateNewGridRow(exercise));
    });

    let weightList = document.getElementsByClassName("exWeight");
    for (let weight of weightList){
        weight.contentEditable = true;
    }
}

function CreateAndPopulateNewGridRow(exercise){
    let newGridRow = document.createElement('div');
    newGridRow.classList.add('grid-row');
    newGridRow.id = 'ex' + exercise.exerciseId;

    

    newGridRow.appendChild(createNewGridItem('Name', exercise.exerciseName));
    newGridRow.appendChild(createNewGridItem('SetsAndReps', getSetsAndReps(exercise)));
    newGridRow.appendChild(createNewGridItem('Weight', exercise.exerciseWeight));
    newGridRow.appendChild(createNewGridItem('Success', 'check'));
    newGridRow.appendChild(createNewGridItem('Fail', 'cancel'));
    //'check' and 'cancel' are material icons

    if (exercise.exerciseCompleted == '1'){
        if (exercise.exerciseSuccess == '1'){
            newGridRow.classList.add('success');
            newGridRow.childNodes[3].classList.add('highlight-success');
        }
        else{
            newGridRow.classList.add('fail');
            newGridRow.childNodes[4].classList.add('highlight-fail');
        }
            

    }

    return newGridRow;
}

function createNewGridItem(name, text){
    let newGridItem = document.createElement('div');
    newGridItem.classList.add('grid-item');
    newGridItem.classList.add('ex' + name);
    let newTextContent = document.createTextNode(text);
    newGridItem.appendChild(newTextContent);

    if(name == 'Success' || name == 'Fail')
        newGridItem.classList.add('material-icons');

    return newGridItem;
}

function getSetsAndReps(exercise){

    switch (parseInt(exercise.exerciseTier,10)){
        case 1: {
            switch(parseInt(exercise.exerciseFailCount,10)){
                case 0: return '5x3 + AMRAP';
                case 1: return '6x2 + AMRAP';
                case 2: return '10x1 + AMRAP';
            }
        } break;
        case 2: {
            switch(parseInt(exercise.exerciseFailCount,10)){
                case 0: return '3x10';
                case 1: return '3x8';
                case 2: return '3x6';
            }
        } break;
        case 3: return '3x15 + AMRAP';
        default: return 'getSetsAndReps error';
        
    }
}





document.addEventListener('click', function(event){
    if (event.target.matches('.exSuccess') || event.target.matches('.exFail')){
        updateExerciseStatus(event);
    }
        
    if (event.target.matches('#finishDay')){
        finishDay();
    }
        

});

document.addEventListener('focusout', function(event){
    if (event.target.matches('.exWeight')){
        let exID = event.target.parentNode.id.replace('ex','');
        let weight = event.target.innerText;
        updateExerciseWeight(day[0].dayId, exID, weight);
        updateExercisesCurrentStatus
        
    }
    
});




function updateExerciseWeight(dayId, exerciseId, weight){
    let xhr = new XMLHttpRequest();
        xhr.open("POST", "https://anklu.pl/fitness/training/updateExerciseWeight.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send('dayId='+dayId+'&exerciseId='+exerciseId+'&exerciseWeight='+weight);
        let response;
        xhr.addEventListener('load', function() {
            if (this.status != 200) {
                console.log(this.status);
            }
        })
}

function updateExerciseStatus(event){
    
    let parentNode = event.target.parentNode;
    let successNode = event.target.parentNode.childNodes[3];
    let failNode = event.target.parentNode.childNodes[4];
    

    if (event.target == successNode){
        parentNode.classList.remove('fail');
        parentNode.classList.toggle('success');
        failNode.classList.remove('highlight-fail');
        successNode.classList.toggle('highlight-success');
    }
    else if (event.target == failNode){
        parentNode.classList.remove('success');
        parentNode.classList.toggle('fail');
        successNode.classList.remove('highlight-success');
        failNode.classList.toggle('highlight-fail')
    }
    

    let dayId = day[0].dayId;
    let exerciseId = parentNode.id.match(/\d+/)[0];
    let exerciseSuccess;
    let exerciseCompleted;

    if (parentNode.classList.contains('success'))
        exerciseSuccess = 1;
    if (parentNode.classList.contains('fail'))
        exerciseSuccess = 0;

    if (parentNode.classList.contains('success') || parentNode.classList.contains('fail'))
        exerciseCompleted = 1;
    else
        exerciseCompleted = 0;


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "https://anklu.pl/fitness/training/updateExerciseStatus.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send('dayId='+dayId+'&exerciseId='+exerciseId+'&exerciseSuccess='+exerciseSuccess+'&exerciseCompleted='+exerciseCompleted);
    xhr.addEventListener('load', function() {
        if (this.status != 200) {
            console.log(this.status);
            }
    })
}

function updateFailCount(){
    for(i = 0; i < day.length; i++){
        if (document.getElementById('ex'+day[i].exerciseId).classList.contains('fail')){
            day[i].failCount = day[i].failCount + 1;
            if (day[i].failCount > 2){
                day[i].failCount = 0;
               //TODO reduceWeightOnTooManyFailures();
            }
                
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "https://anklu.pl/fitness/training/updateFailCount.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('dayId='+day[0].dayId+'&exerciseId='+day[i].exerciseId+'&exerciseFailCount='+day[i].failCount);
            let response;
            xhr.addEventListener('load', function() {
                if (this.status != 200) {
                    console.log(this.status);
                }
            })
        }
    }
}

function finishDay(){
    if(allExercisesAreFinished()){
        
        updateFailCount();
        addDayToHistory(day[0].dayId, day[0].userId, new Date());
        createDay(day[0].email, day[0].programId, day[0].dayNumber);
        clearGrid();
        loadDay();
    }
    else{
        
    } 

}

function allExercisesAreFinished(){
    let children = document.getElementById('grid-container').children;

    for (let i = 1; i< children.length; i++){
        if(!children[i].classList.contains('success') &&
           !children[i].classList.contains('fail'))
        return false;
    }
    return true;
}

function addDayToHistory(dayId, userId, date){
    date = date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "https://anklu.pl/fitness/training/addDayToHistory.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send('dayId='+dayId+'&userId='+userId+'&date='+date);
    xhr.addEventListener('load', function() {
        if (this.status != 200) {
            console.log(this.status);
        }
    });

}


function createDay(email, programId, dayNumber){

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "https://anklu.pl/fitness/training/createDay.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if(parseInt(dayNumber, 10) == 4)
        dayNumber = 1;
    else dayNumber = parseInt(dayNumber, 10) +1;
    console.log("email="+email+"&programId="+programId+"&dayNumber="+dayNumber);
    xhr.send("email="+email+"&programId="+programId+"&dayNumber="+dayNumber);
    xhr.addEventListener('load', function() {
        if (this.status != 200) {
            console.log(this.status);
        }
        else {
            console.log(this.responseText);
        }
    })
}

function clearGrid(){
    let grid = document.getElementById('grid-container');
    
    while (grid.childNodes[2]){
        grid.removeChild(grid.childNodes[2]);
    }
}




// TODO LoadExercise.php sql query is wrong

 /* TODO

 - Last Set AMRAP image
 - Allow manual weight change
 - Mobile first
 - Update Tier 3 weight based on last day (A1 -> B1, not A1 -> A1)
 - Some kind of Tier 3 progression system
 - Day info, day progression schema
 - Stats page
 
 - Style "finish day" button

 - Make this pretty
 */

