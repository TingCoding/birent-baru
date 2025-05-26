const signin = document.querySelector('.sign-in-btn');

signin.addEventListener("click", function(e){
    e.preventDefault();

    window.location.href = "/login";
});