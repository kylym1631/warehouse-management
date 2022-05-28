const btn = document.getElementById("login-btn")
var timeLeft = 30;
var elem = document.getElementById('attempt');

var timerId = setInterval(countdown, 1000);

function countdown() {
    btn.disabled = true;
    if (timeLeft == -1) {
        clearTimeout(timerId);
        btn.disabled = false;
        elem.innerHTML = '';
    } else {
        elem.innerHTML = timeLeft + ' seconds remaining till next attempts';
        timeLeft--;
    }
}