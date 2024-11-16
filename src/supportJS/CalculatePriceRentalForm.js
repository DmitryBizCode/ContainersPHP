document.getElementById('calculatePrice').addEventListener('click', function () {
    const containerType = document.getElementById('container').value;
    const route = document.getElementById('route').value;
    const startDate = new Date(document.getElementById('start_date').value);
    const endDate = new Date(document.getElementById('end_date').value);
    const cargo = document.querySelectorAll('input[name="cargo[]"]:checked');
    const cargoCount = cargo.length;

    // Calculate rental duration in days
    const rentalDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
    const dateError = document.getElementById('dateError');
    const submitButton = document.querySelector('button[type="submit"]');

    // Check minimum rental period (10 days)
    if (rentalDays < 10) {
        dateError.classList.remove('d-none');
        submitButton.disabled = true;
        document.getElementById('calculatedPrice').innerText = '$0'; // Reset price if invalid
        return; // Exit the function
    } else {
        dateError.classList.add('d-none');
        submitButton.disabled = false;
    }

    // Base price calculation
    let price = 5000; // Base price
    if (containerType === '2') price += 1000; // Larger container
    if (route === '2') price += 2000; // Longer route
    price += cargoCount * 200; // Additional cost per cargo type
    price += rentalDays * 5; // $5 per day

    // Update calculated price
    document.getElementById('calculatedPrice').innerText = `$${price}`;
});