function myFunction() {
    var modal = document.getElementById('blur-back');
    var span = document.getElementsByClassName("close-content")[0];
    setTimeout(function() {
        modal.style.display = "block";
    }, 1000);
    setTimeout(function() {
        modal.style.display = "none";
    }, 5000);
    span.onclick = function() {
        modal.style.display = "none";
    }
}