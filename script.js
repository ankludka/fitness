
/*
const button = document.getElementById("submitButton1"); //WRONG

    if(document.getElementById("error").innerHTML = "")
    {
        document.getElementById("error").classList.remove("hidden");
        alert(document.getElementById("error").innerHTML);
    }

//Validate email and password
button.addEventListener("click", function(e){

    const error = document.getElementById("error");
    error.classList.add("hidden");
    error.innerHTML = "";

    if(isEmpty("email"))
    {
        e.preventDefault();
        
        error.innerHTML += "Fill in your email address<br>";
        error.classList.remove("hidden");

    }


    if(isEmpty("password"))
    {
        e.preventDefault();

        error.innerHTML += "Fill in your password";
        error.classList.remove("hidden");
    }

    
})

function isEmpty(field){
    
    if(document.getElementById(field).value == "")
        return true;
    else return false;
}

*/

//TODO FIX validation
//TODO extend it to both login and register
//TODO display responses somewhere (not an alert...)
document.getElementById("loginButton").addEventListener("click", function(){

   
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let stay = (document.getElementById('stayLogged').checked ? 1 : 0);

    xhr.send("email="+email+"&password="+password+"&stayLogged="+stay+"&register=1");

    xhr.addEventListener('load', function() {
        if (this.status === 200) {
//TODO change response to login/register
            alert(xhr.responseText);
        }
        else
        alert("something fucky");
    })


});



