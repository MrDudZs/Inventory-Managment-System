// Opens Password Reset - Hides Login 
const openPasswordReset = document.querySelector("#resetPassword");
openPasswordReset.addEventListener("click", function (e) {
    document.querySelector('#loginForm').style.display = "none";
    document.querySelector('#collapsePassword').style.display = "block";
})
// Opens Login - Hides Password Reset 
const backToLogin = document.querySelector("#backtologin");
backToLogin.addEventListener("click", function (e) {
    document.querySelector('#loginForm').style.display = "block";
    document.querySelector('#collapsePassword').style.display = "none";
})
