import './bootstrap';
import Alpine from 'alpinejs';
import Chart from 'chart.js/auto';

window.Alpine = Alpine;

Alpine.start();

// Chart.js initialization
document.addEventListener('DOMContentLoaded', function () {
    var ctxSales = document.getElementById('salesChart').getContext('2d');
    new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: @json($salesMonths),
            datasets: [{
                label: 'Total Sales (₱)',
                data: @json($salesData),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Inventory Chart
    var ctxInventory = document.getElementById('inventoryChart').getContext('2d');
    new Chart(ctxInventory, {
        type: 'bar',
        data: {
            labels: @json($productNames), // Product names from your controller
            datasets: [{
                label: 'Stock Levels',
                data: @json($inventoryLevels), // Stock data
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});