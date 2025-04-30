document.getElementById("registerForm") ? .addEventListener("submit", function(event) {
    document.getElementById("loadingScreen").style.display = "flex";

    setTimeout(function() {
        event.target.submit();
    }, 3000);
});

window.addEventListener('beforeunload', function() {
    document.getElementById("loadingScreen").style.display = "flex";
});