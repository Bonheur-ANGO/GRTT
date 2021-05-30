//toggle button
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

var progress = document.querySelector(".in_progress");
progress.addEventListener("click", function() {
    var modal = document.querySelector('.modal');
    modal.style.display = "block";
    var logo = document.querySelector('.logo');
    logo.style.display = "none";
    var container = document.querySelector('.sidebar');
    //container.style.filter = "blur(5px)";
    var close_modal = modal.childNodes[3];
    close_modal.addEventListener("click", function() {
        modal.style.display = "none";
        logo.style.display = "block";
    })
})