<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bar.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>
<body>
    <section class="step-wizard">
        <ul class="step-wizard-list">
            <li class="step-wizard-item">
                <span class="progress-count">1</span>
                <span class="progress-label">Billing Info</span>
            </li>
            <li class="step-wizard-item current-item">
                <span class="progress-count">2</span>
                <span class="progress-label">Payment Method</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">Checkout</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">4</span>
                <span class="progress-label">Success</span>
            </li>
        </ul>
        <button id="progressButton">Next Step</button>
    </section>

    <script>
document.getElementById('progressButton').addEventListener('click', function() {
    var currentStep = document.querySelector('.current-item');
    var nextStep = currentStep.nextElementSibling;

    if (nextStep) {
        currentStep.classList.remove('current-item');
        nextStep.classList.add('current-item');

        // Change the content of the current step to a tick with the same color as the progress count
        var progressCount = currentStep.querySelector('.progress-count');
        var tickColor = window.getComputedStyle(progressCount).color; // Get computed color
        currentStep.querySelector('.progress-count').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="' + tickColor + '" d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>';
    } else {
        // Change the content of the last step to a tick with the same color as the progress count
        var progressCount = currentStep.querySelector('.progress-count');
        var tickColor = window.getComputedStyle(progressCount).color; // Get computed color
        currentStep.querySelector('.progress-count').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="' + tickColor + '" d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>';
    }
});




</script>

</body>
</html>
