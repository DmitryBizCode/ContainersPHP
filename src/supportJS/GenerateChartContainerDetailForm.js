// Функція для генерації випадкових даних для графіків
function generateRandomData(sensorType) {
    const data = [];
    const labels = [];
    let currentTime = new Date();

    for (let i = 0; i < 10; i++) {
        const interval = Math.random() > 0.5 ? 60 : 30; // 60 хвилин або 30 хвилин
        currentTime.setMinutes(currentTime.getMinutes() - interval);
        labels.unshift(currentTime.toLocaleTimeString());

        let randomValue;
        switch (sensorType) {
            case 'temperature':
                randomValue = (Math.random() * 10 + 20).toFixed(1);
                break;
            case 'humidity':
                randomValue = (Math.random() * 50 + 30).toFixed(1);
                break;
            case 'vibration':
                randomValue = (Math.random() * 0.05).toFixed(2);
                break;
            case 'illumination':
                randomValue = (Math.random() * 2).toFixed(2);
                break;
            case 'openings':
                randomValue = Math.floor(Math.random() * 10);
                break;
            case 'gps':
                randomValue = Math.random().toFixed(4); // Псевдо-значення для демонстрації
                break;
            case 'gases':
                randomValue = (Math.random() * 0.05).toFixed(2);
                break;
            case 'inclines':
                randomValue = (Math.random() * 15).toFixed(1);
                break;
            default:
                randomValue = 0;
        }
        data.unshift(randomValue);
    }

    return { labels, data };
}

// Створення графіків
function createChart(chartId, label, sensorType) {
    const sensorData = generateRandomData(sensorType);

    const ctx = document.getElementById(chartId).getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: sensorData.labels,
            datasets: [{
                label: label,
                data: sensorData.data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Time'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Value'
                    },
                    beginAtZero: true
                }
            }
        }
    });
}

// Ініціалізація графіків для кожного датчика
document.addEventListener('DOMContentLoaded', () => {
    createChart('temperatureChart', 'Temperature (°C)', 'temperature');
    createChart('humidityChart', 'Humidity (%)', 'humidity');
    createChart('vibrationChart', 'Vibration (g)', 'vibration');
    createChart('illuminationChart', 'Illumination (lux)', 'illumination');
    createChart('openingsChart', 'Openings (count)', 'openings');
    createChart('gpsChart', 'GPS Coordinates (pseudo)', 'gps');
    createChart('gasesChart', 'Gases (%)', 'gases');
    createChart('inclinesChart', 'Inclines (°)', 'inclines');
});