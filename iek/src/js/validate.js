const username = document.getElementById("name3");
const fname = document.getElementById("fname3");
const lname = document.getElementById("lname3");

username.addEventListener("blur", function(){
    if ( isEmpty(this.value) ){
        username.style.borderColor = "red";
    }
});