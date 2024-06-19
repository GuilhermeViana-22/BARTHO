function criarGrafico(countDogsMacho, countDogsFemea, countCatsMacho, countCatsFemea) {
    var ctx = document.getElementById('animalChart').getContext('2d');
    var animalChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Cães Machos', 'Cães Fêmeas', 'Gatos Machos', 'Gatos Fêmeas'],
            datasets: [{
                label: 'Total',
                backgroundColor: ['#007bff', '#28a745', '#ffc107', '#17a2b8'],
                data: [countDogsMacho, countDogsFemea, countCatsMacho, countCatsFemea]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'top',
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });

    return animalChart;
}
