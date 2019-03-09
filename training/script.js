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
                case 0: return '5x3';
                case 1: return '6x2';
                case 2: return '10x1';
            }
        } break;
        case 2: {
            switch(parseInt(exercise.exerciseFailCount,10)){
                case 0: return '3x10';
                case 1: return '3x8';
                case 2: return '3x6';
            }
        } break;
        case 3: return '3x15';
        default: return 'getSetsAndReps error';
        
    }
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



document.addEventListener('click', function(event){
    if (event.target.matches('.exSuccess') || event.target.matches('.exFail')){
        updateExerciseStatus(event);
        //TODO uploadExerciseStatus(event);
    }
        
    if (event.target.matches('#finishDay'))
        finishDay();
});




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
    console.log(event);


    let dayId = day[0].dayId;
    let exerciseId = parentNode.id.match(/\d+/)[0];

    if (parentNode.classList.contains('success'))
        let exerciseSuccess = 1;
    if (parentNode.classList.contains('fail'))
        let exerciseSuccess = 0;

    if (parentNode.classList.contains('success') || parentNode.classList.contains('fail'))
        let exerciseCompleted = 1;
    else
        let exerciseCompleted = 0;


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "https://anklu.pl/fitness/training/updateExerciseStatus.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send('dayId='+dayId+'&exerciseId='+exerciseId+'&exerciseSuccess='+exerciseSuccess+'&exerciseCompleted='+exerciseCompleted);
    let response;
    xhr.addEventListener('load', function() {
        if (this.status != 200) {
            console.log(this.status);
            }
    })
}

function finishDay(){
    if(allExercisesFinished()){
        //TODO
        
        updateFailCount();
        addCurrentDayToHistory();
        displaySuccessMessage();
        createNextDay();
        //loadDay();

        

    }
    else{
        console.log('not yet');
        console.log(document.cookie);
    } 

}

function allExercisesFinished(){
    let children = document.getElementById('grid-container').children;

    for (let i = 1; i< children.length; i++){
        if(!children[i].classList.contains('success') &&
           !children[i].classList.contains('fail'))
        return false;
    }
    return true;
}



function addCurrentDayToHistory(){

}

function displaySuccessMessage(){

}

function createNextDay(){

}




 /* TODO

  - If last day in database is finished -> load last 'next' day 
   (if today finished A1, load last B1)
   Create new day based on the loaded one, upload it to DB and display to user
  - If no days exist, create a new day

 - Day info, day progression schema

 - Last Set AMRAP image
 - Style "finish day" button
 - Update day info and failCount on success/fail click

 - Make this shit pretty, really pretty
 */

