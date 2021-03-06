

const button = document.getElementById("loginButton");

if(document.getElementById("alert").innerHTML = "")
{
    document.getElementById("alert").classList.remove("hidden");
    alert(document.getElementById("alert").innerHTML);
}
/*
//Validate email and password
button.addEventListener("click", function(e){

    const alert = document.getElementById("alert");
    alert.classList.add("hidden");
    alert.innerHTML = "";

    if(isEmpty("email"))
    {
        e.preventDefault();
        
        alert.innerHTML += "Fill in your email address<br>";
        alert.classList.remove("hidden");

    }


    if(isEmpty("password"))
    {
        e.preventDefault();

        alert.innerHTML += "Fill in your password";
        alert.classList.remove("hidden");
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
//Cookies or sessions to stay logged 
//TODO block access to /training when direct linking and not logged in
document.getElementById("loginButton").addEventListener("click", login);
document.getElementById("registerButton").addEventListener("click", register);


function login(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let stay = (document.getElementById('stayLogged').checked ? 1 : 0);

    xhr.send("email="+email+"&password="+password+"&stayLogged="+stay+"&login=1");

    xhr.addEventListener('load', function() {
        if (this.status === 200) {
            //TODO change response
            if(xhr.responseText == "success")
               window.location.href = "./training";
            else{
                alert(xhr.responseText);
                clear(document.getElementById("password"));
            }
                
        }
        else
            alert("alert code " + this.status);
    })
    
}


function register(){
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./register.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("email="+email+"&password="+password+"&register=1");

    xhr.addEventListener('load', function() {
        if (this.status === 200) {
            //TODO change response
            alert(xhr.responseText);
            clear(document.getElementById("password"));
            createDay(email, 1, 0);
        }
        else
            alert("alert code " + this.status);
            
    })
}

function clear(field){
    field.value = "";
}

function createDay(email){

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "https://anklu.pl/fitness/training/createDay.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send("email="+email+"&programId=1&dayNumber=1");
    xhr.addEventListener('load', function() {
        if (this.status != 200) {
            console.log(this.status);
        }
        else {
            console.log(this.responseText);
        }
    })
}