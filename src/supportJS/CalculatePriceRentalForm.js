document.getElementById('calculatePrice').addEventListener('click', function () {
    const containerSelect = document.getElementById('container');
    const routeSelect = document.getElementById('route');
    const startDate = new Date(document.getElementById('start_date').value);
    const endDate = new Date(document.getElementById('end_date').value);
    const cargo = document.querySelectorAll('input[name="cargo[]"]:checked');
    const cargoCount = cargo.length;

    const dateError = document.getElementById('dateError');
    const submitButton = document.querySelector('button[type="submit"]');
    const priceDisplay = document.getElementById('calculatedPrice');

    // Перевірка дат
    const rentalDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));

    // Отримання динамічного мінімального значення днів із вибраного маршруту
    const selectedRoute = routeSelect.options[routeSelect.selectedIndex];
    const estimatedTime = parseInt(selectedRoute.getAttribute('data-time'), 10); // Мінімально дозволена кількість днів

    if (rentalDays < estimatedTime || isNaN(rentalDays)) {
        dateError.classList.remove('d-none');
        dateError.textContent = `Rental duration must be at least ${estimatedTime} days.`;
        submitButton.disabled = true;
        priceDisplay.innerText = '$0'; // Reset price if invalid
        return;
    } else {
        dateError.classList.add('d-none');
        submitButton.disabled = false;
    }

    // Отримання інформації про контейнер
    const selectedContainer = containerSelect.options[containerSelect.selectedIndex];
    const containerType = selectedContainer.value;
    const containerOwner = selectedContainer.getAttribute('data-owner');
    const containerCountry = selectedContainer.getAttribute('data-country');

    // Отримання інформації про маршрут
    const routeDistance = parseFloat(selectedRoute.getAttribute('data-distance')) || 0;

    // Константи для розрахунку
    const basePrice = 5000;
    const containerTypeMultiplier = {
        1: 1, // Default container
        2: 1.2, // Larger container
        3: 1.5 // Special container (IoT-enabled, refrigerated)
    };
    const distanceRate = 0.1; // Price per km
    const dailyRate = 10; // Daily base rate
    const cargoMultiplier = 50; // Price per cargo type

    // Розрахунок ціни
    let price = basePrice;

    // Додаємо множник для типу контейнера
    price *= containerTypeMultiplier[containerType] || 1;

    // Додаємо вартість залежно від відстані
    price += routeDistance * distanceRate;

    // Додаємо вартість залежно від кількості днів оренди
    price += rentalDays * dailyRate;

    // Додаємо вартість за кількість вантажу
    price += cargoCount * cargoMultiplier;

    // Знижка для довготривалих оренд (>30 днів)
    if (rentalDays > 30) {
        price *= 0.9; // 10% discount
    }

    // Відображення ціни
    priceDisplay.innerText = `$${price.toFixed(2)}`;
    document.getElementById('hiddenPrice').value = price;
});
