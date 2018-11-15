let userExerciseData = [
    {
        name : "Squats",
        tier : 1,
        weight : 50,
        failCount : 0
    },
    {
        name : "Squats2",
        tier : 3,
        weight : 250,
        failCount : 2
    },
    {
        name : "Squats3",
        tier : 3,
        weight : 350,
        failCount : 3
    },
    {
        name : "Squats4",
        tier : 41,
        weight : 450,
        failCount : 4
    }
];

const grid = document.getElementById('grid-container');

function populateExerciseGrid(exerciseData){
    exerciseData.forEach(exercise => {
       for (let property in exercise){
           console.log(exercise[property]);
       }

    });
}

populateExerciseGrid(userExerciseData);



/*
let exercises = document.createElement('div');
exercises.classList.add
exercises.innerHTML = '<p class:"whatup">inserted</p>';
grid.appendChild(exercises);
*/