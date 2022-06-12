<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



<script>
    let ctx = document.getElementById('myChart');
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Confirmed', 'Active', 'Deaths', 'Recovered'],
            datasets: [{
                label: 'coronavirus cases',
                data: [<?php echo $confirmed; ?>, <?php echo $active; ?>, <?php echo $deaths; ?>, <?php echo $recovered; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(0, 0, 0, 0.5)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(0, 0, 0, 0.5)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>


<script>
    let month = document.getElementById('monthChart');
    let monthChart = new Chart(month, {
        type: 'bar',
        data: {
            labels: ['MonthlyConfirmed', 'MonthlyDeaths', 'MonthlyRecovered'],
            datasets: [{
                label: '',
                data: [<?php echo $monthlyConfirmedCases; ?>, <?php echo $monthlyDeathsCases; ?>, <?php echo $monthlyRecoveredCases; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(0, 0, 0, 0.5)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(0, 0, 0, 0.5)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {

            title: {
            display: true,
            fontSize: 25,
            fontColor:'rgba(0, 0, 0, 0.5)',
            text: 'Month Coronavirus Cases'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }

    });
</script>


<script>
    let threemonth = document.getElementById('threeMonthsChart');
    let threeMonthsChart = new Chart(threemonth, {
        type: 'bar',
        
        data: {
            labels: [' Three Months Confirmed', 'Three Months Deaths', 'Three Months Recovered'],
            datasets: [{
                label: '',
                data: [<?php echo $threeMonthsConfirmedCases; ?>, <?php echo $threeMonthsDeathsCases; ?>, <?php echo $threeMonthsRecoveredCases; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(0, 0, 0, 0.5)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(0, 0, 0, 0.5)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {

            title: {
            display: true,
            fontSize: 25,
            fontColor:'rgba(0, 0, 0, 0.5)',
            text: 'Three Months Coronavirus Cases'
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }

    });
</script>






<!-- <script>
    let twoWeeks = document.getElementById('twoWeeksChart');
    let TwoWeekChart = new Chart(twoWeeks, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: '14 days cases',
                data: [<?php echo json_encode(' '); ?>, ],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script> -->