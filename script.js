

const button = document.getElementById("submitButton");

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
