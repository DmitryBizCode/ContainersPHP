<?php
require 'vendor/autoload.php';
use App\Services\IotService;
use App\Services\SQLService;
$sql = new SQLService();
$iotService = new IotService($sql->getPdo());
dump($iotService->getAllTemperatures());
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Графік на основі PHP масиву</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Підключення бібліотеки Chart.js -->
</head>
<body>

    <h2>Графік на основі PHP масиву</h2>
    <canvas id="myChart" width="400" height="200"></canvas>

    <?php
    // Масив з даними
    $data = [12, 19, 3, 5, 2, 3, 10, 8, 6, 15];
    ?>

    <script>
        // Отримання даних з PHP
        const data = <?php echo json_encode($data); ?>;

        // Налаштування та побудова графіка
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line', // Тип графіка: 'line', 'bar', 'pie' тощо
            data: {
                labels: Array.from({ length: data.length }, (_, i) => i + 1), // Генерація міток для осі X
                datasets: [{
                    label: 'Значення масиву',
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>

