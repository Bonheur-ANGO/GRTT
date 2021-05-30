var button = document.querySelector(".button");
button.addEventListener("click", function() {
    var bloc = document.querySelector(".bloc");
    bloc.classList.add("active");
    bloc.style.transition = "all linear .5s";
    var close = document.querySelector(".close");
    close.addEventListener("click", function() {
        bloc.classList.remove("active");
    })
});