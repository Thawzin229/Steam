let signIn = document.getElementById("sign-in-container");
let signUp = document.getElementById("sign-up-container");

let click1 = document.getElementById("signIn-button");
let click2 = document.getElementById("signUp-button");

click1.addEventListener('click',()=>{
    signIn.style.display = "flex";
    signUp.style.display = "none";
});
click2.addEventListener('click',()=>{
    signIn.style.display = "none";
    signUp.style.display = "flex";
});