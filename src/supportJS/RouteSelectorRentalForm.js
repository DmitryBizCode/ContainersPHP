document.addEventListener('DOMContentLoaded', function () {
    const routeSelector = document.querySelector('.route-selector');

    routeSelector.addEventListener('change', function () {
        const selectedOption = routeSelector.options[routeSelector.selectedIndex];
        const estimatedTime = selectedOption.getAttribute('data-time');
        const originPort = selectedOption.getAttribute('data-origin-port');
        const originCountry = selectedOption.getAttribute('data-origin-country');
        const destinationPort = selectedOption.getAttribute('data-destination-port');
        const destinationCountry = selectedOption.getAttribute('data-destination-country');
        const distance = selectedOption.getAttribute('data-distance');
        // Update Estimated Time
        const infoDisplay = document.getElementById(routeSelector.getAttribute('data-info-target'));
        if (infoDisplay) {
            infoDisplay.textContent = `Estimated Time: ${estimatedTime || 'N/A'} days`;
            document.getElementById('time_shipment').value = estimatedTime;
        }

        // Update Delivery Details
        const originDisplay = document.getElementById(routeSelector.getAttribute('data-info-target-bottom-origin'));
        const destinationDisplay = document.getElementById(routeSelector.getAttribute('data-info-target-bottom-destination'));
        const distanceDisplay = document.getElementById(routeSelector.getAttribute('data-info-target-bottom-distance'));

        if (originDisplay) {
            originDisplay.textContent = `${originPort || 'N/A'}, ${originCountry || 'N/A'}`;
        }

        if (destinationDisplay) {
            destinationDisplay.textContent = `${destinationPort || 'N/A'}, ${destinationCountry || 'N/A'}`;
        }

        if (distanceDisplay) {
            distanceDisplay.textContent = `${distance || 'N/A'} km`;
        }
    });
});