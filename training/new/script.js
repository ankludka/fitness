let userExerciseData = [
    {
        name : "Squats",
        weight : 50,
        tier : 1,        
        failCount : 0,
        id: 1,
        lastSetAmrap: true,
        weightProgression: 2.5
    },
    {
        name : "Squats2",
        weight : 250,
        tier : 2,
        failCount : 1,
        id: 2,
        lastSetAmrap: true,
        weightProgression: 5
    },
    {
        name : "Squats3",
        weight : 350,
        tier : 3,
        failCount : 2,
        id : 3,
        lastSetAmrap: false,
        weightProgression: 5
    },
    {
        name : "Squats4",
        weight : 450,
        tier : 41,
        failCount : 3,
        id : 4,
        lastSetAmrap: false,
        weightProgression: 1
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
    let newGridRow = document.createElement("div");
    newGridRow.classList.add("grid-row");
    newGridRow.id = "ex" + exercise.id;

    newGridRow.appendChild(createNewGridItem("Name", exercise.name));
    newGridRow.appendChild(createNewGridItem("SetsAndReps", getSetsAndReps(exercise)));
    newGridRow.appendChild(createNewGridItem("Weight", exercise.weight));
    newGridRow.appendChild(createNewGridItem("Success", "X"));
    newGridRow.appendChild(createNewGridItem("Fail", "X"));

    return newGridRow;
}

function createNewGridItem(name, text){
    let newGridItem = document.createElement("div");
    newGridItem.classList.add("grid-item");
    newGridItem.classList.add("ex" + name);
    let newTextContent = document.createTextNode(text);
    newGridItem.appendChild(newTextContent);

    return newGridItem;
}

function getSetsAndReps(exercise){

    switch (exercise.tier){
        case 1: {
            switch(exercise.failCount){
                case 0: return "5x3";
                case 1: return "6x2";
                case 2: return "10x1";
                case 3: {
                    updateFailCount(); //TODO move this somewhere else
                    return "5x3";
                }
            }
        }
        case 2: {
            switch(exercise.failCount){
                case 0: return "3x10";
                case 1: return "3x8";
                case 2: return "3x6";
                case 3: {
                    updateFailCount(); //TODO move this somewhere else
                    return "3x10";
                }
            }
        }
        case 3: return "3x15";
        default: return "getSetsAndReps error";
        
    }
}

function updateFailCount(exercise){
    exercise.failCount < 3 ? exercise.failCount++ : exercise.failCount = 0;
}

 



 /* TODO
 - create database
 - load data from database (based on user) -> load the last unfinished day
  - If last day in database is finished -> load last 'next' day 
   (if today finished A1, load last B1)
   Create new day based on the loaded one, upload it to DB and display to user

 - Day info, day progression schema

 - Success button
 - Fail button
 - Last Set AMRAP image
 - Add "Finish Day" button
 - Update day info and failCount on success/fail click

 - Make this shit pretty
 */

