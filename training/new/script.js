let userExerciseData = [
    {
        name : 'Squats',
        weight : 50,
        tier : 1,        
        failCount : 0,
        id: 1,
        lastSetAmrap: true,
        weightIncrement: 2.5,
        completed: null
    },
    {
        name : 'Squats2',
        weight : 250,
        tier : 2,
        failCount : 1,
        id: 2,
        lastSetAmrap: true,
        weightProgression: 5,
        completed: null
    },
    {
        name : 'Squats3',
        weight : 350,
        tier : 3,
        failCount : 2,
        id : 3,
        lastSetAmrap: false,
        weightProgression: 5,
        completed: null
    },
    {
        name : 'Squats4',
        weight : 450,
        tier : 41,
        failCount : 3,
        id : 4,
        lastSetAmrap: false,
        weightProgression: 1,
        completed: null
    }
];



populateExerciseGrid(userExerciseData);



function populateExerciseGrid(exerciseData){
    let grid = document.getElementById('grid-container');
    exerciseData.forEach(exercise => {
        grid.appendChild(CreateAndPopulateNewGridRow(exercise));
    });
}

function CreateAndPopulateNewGridRow(exercise){
    let newGridRow = document.createElement('div');
    newGridRow.classList.add('grid-row');
    newGridRow.id = 'ex' + exercise.id;

    newGridRow.appendChild(createNewGridItem('Name', exercise.name));
    newGridRow.appendChild(createNewGridItem('SetsAndReps', getSetsAndReps(exercise)));
    newGridRow.appendChild(createNewGridItem('Weight', exercise.weight));
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

    switch (exercise.tier){
        case 1: {
            switch(exercise.failCount){
                case 0: return '5x3';
                case 1: return '6x2';
                case 2: return '10x1';
                case 3: {
                    updateFailCount(); //TODO move this somewhere else
                    return '5x3';
                }
            }
        }
        case 2: {
            switch(exercise.failCount){
                case 0: return '3x10';
                case 1: return '3x8';
                case 2: return '3x6';
                case 3: {
                    updateFailCount(); //TODO move this somewhere else
                    return '3x10';
                }
            }
        }
        case 3: return '3x15';
        default: return 'getSetsAndReps error';
        
    }
}

function updateFailCount(exercise){
    exercise.failCount < 3 ? exercise.failCount++ : exercise.failCount = 0;
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


}

function finishDay(){
    if(allExercisesFinished()){
        // Display message 'congrats' with maybe some stats
        // Upload finished day to database and mark as finished
        // Switch to next day on message close

    }
    else console.log('not yet');
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



 /* TODO
 - create database
 - load data from database (based on user) -> load the last unfinished day
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

