document.addEventListener('DOMContentLoaded', function () {
    const containerSelectors = document.querySelectorAll('.container-selector');

    containerSelectors.forEach(function (selector) {
        selector.addEventListener('change', function () {
            const selectedOption = selector.options[selector.selectedIndex];
            const owner = selectedOption.getAttribute('data-owner');
            const country = selectedOption.getAttribute('data-country');
            const infoDisplayId = selector.getAttribute('data-info-target');

            const infoDisplay = document.getElementById(infoDisplayId);

            if (infoDisplay) {
                infoDisplay.textContent = `Owner: ${owner || 'N/A'}, Country: ${country || 'N/A'}`;
            }
        });
    });
});