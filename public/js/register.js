const signup = document.querySelector('.sign-up-btn');

signup.addEventListener("click", function(e){
    e.preventDefault();

    window.location.href = "/register";
});