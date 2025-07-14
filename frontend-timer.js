jQuery(document).ready(function($) {
    if (typeof lpTimerData !== 'undefined' && lpTimerData.duration > 0) {
        let timeLeft = lpTimerData.duration;
        const timerDisplay = $('#lp-timer-countdown');
        let cheatDetected = false;
        let interval;

        // Format time as MM:SS
        function formatTime(seconds) {
            const mins = Math.floor(seconds / 60);
            const secs = seconds % 60;
            return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        }

        // Update timer every second
        function updateTimer() {
            timerDisplay.text(formatTime(timeLeft));
            if (timeLeft <= 0) {
                clearInterval(interval);
                // Auto-submit the quiz
                $('button[name="quiz-submit"], .lp-button[action="finish-quiz"]').trigger('click');
            } else {
                timeLeft--;
            }
        }

        // Start the timer
        interval = setInterval(updateTimer, 1000);
        updateTimer();  // Initial display

        // Anti-cheat: Detect tab switch or visibility change
        document.addEventListener('visibilitychange', function() {
            if (document.hidden && !cheatDetected) {
                cheatDetected = true;
                clearInterval(interval);
                alert('Cheating detected: Tab switched. Submitting quiz.');
                $('button[name="quiz-submit"], .lp-button[action="finish-quiz"]').trigger('click');
            }
        });
    }
});