//Author: Nishant Carvalho
//StudentId: 105015672
//Tittle: Assignment 2 CWA

document.addEventListener('DOMContentLoaded', function() {
    // Check if the current page is apply.html
    if (window.location.pathname.endsWith('apply.html')) {
        // Set the time limit in minutes
        var timeLimit = 5;

        // Convert time limit to milliseconds
        var timeLimitMs = timeLimit * 60 * 1000;

        // Start the countdown
        var countdown = setInterval(function() {
            timeLimitMs -= 1000;
            if (timeLimitMs <= 0) {
                clearInterval(countdown);
                // Display warning message on the webpage
                var warningMessage = document.createElement('div');
                warningMessage.textContent = "Time's up! You will be redirected to the home page.";
                warningMessage.classList.add('warning-message');
                document.body.appendChild(warningMessage);
                // Redirect to home page after a delay
                setTimeout(function() {
                    window.location.href = "index.html"; // Redirect to "index.html"
                }, 9000);
            }
        }, 1000);
    }
});
