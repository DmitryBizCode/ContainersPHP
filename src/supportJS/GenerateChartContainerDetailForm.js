// Обробляємо дані сенсорів
const sensorTypes = Object.keys(sensorData); // ["temperatures", "humidity", ...]
const chartConfigs = {
    temperatures: { chartId: "temperatureChart", label: "Temperature", color: "rgba(255, 99, 132, 0.7)" },
    humidity: { chartId: "humidityChart", label: "Humidity", color: "rgba(54, 162, 235, 0.7)" },
    vibrometers: { chartId: "vibrationChart", label: "Vibration", color: "rgba(75, 192, 192, 0.7)" },
    illuminated: { chartId: "illuminationChart", label: "Illumination", color: "rgba(255, 206, 86, 0.7)" },
    openings: { chartId: "openingsChart", label: "Openings", color: "rgba(153, 102, 255, 0.7)" },
    gps: { chartId: "gpsChart", label: "GPS", color: "rgba(255, 159, 64, 0.7)" },
    gases: { chartId: "gasesChart", label: "Gases", color: "rgba(99, 132, 255, 0.7)" },
    inclines: { chartId: "inclinesChart", label: "Inclines", color: "rgba(162, 235, 54, 0.7)" }
};

function createChart(sensorType, data, config) {
    const ctx = document.getElementById(config.chartId).getContext("2d");
    new Chart(ctx, {
        type: "line",
        data: {
            labels: data.map(item => item.time), // Часові мітки
            datasets: [{
                label: config.label,
                data: data.map(item => item.value), // Значення сенсора
                borderColor: config.color,
                backgroundColor: config.color.replace("0.7", "0.3"),
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: "Time" } },
                y: { title: { display: true, text: "Value" } }
            }
        }
    });
}

// Генеруємо графіки для кожного типу сенсора
sensorTypes.forEach(sensorType => {
    if (chartConfigs[sensorType]) {
        createChart(sensorType, sensorData[sensorType], chartConfigs[sensorType]);
    }
});