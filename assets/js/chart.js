const barDailyActiveUsers = document.getElementById('dailyActiveUsers');
const ctxrankingTags = document.getElementById('rankingTags');

const labels = ['M', 'T', 'W', 'Th', 'F', 'Sat', 'Sun'];

new Chart(barDailyActiveUsers, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'NowUKnow Users',
            data: [8, 12, 16, 81, 100, 43, 5, 0],
            backgroundColor: [
                'rgba(75, 113, 165, 100)',
                'rgba(75, 113, 165, 100)',
                'rgba(75, 113, 165, 100)',
                'rgba(75, 113, 165, 100)',
                'rgba(75, 113, 165, 100)',
                'rgba(75, 113, 165, 100)',
                'rgba(75, 113, 165, 100)',
                'rgba(75, 113, 165, 100)'
            ],
            borderColor: [
                'rgb(114, 145, 184)',
                'rgb(114, 145, 184)',
                'rgb(114, 145, 184)',
                'rgb(114, 145, 184)',
                'rgb(114, 145, 184)',
                'rgb(114, 145, 184)',
                'rgb(114, 145, 184)',
                'rgb(114, 145, 184)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false, 
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

new Chart(ctxrankingTags, {
    type: 'bar',
    data: {
        labels: ['Cooking', 'Gaming', 'Educational', 'Life', 'Beauty'],
        datasets: [{
            data: [55.6, 22.2, 11.1, 5.6, 5.6],
            backgroundColor: [
                '#FDB45C',
                '#46BFBD',
                '#949FB1',
                '#4D5360',
                '#FFC870'
            ],
            hoverBackgroundColor: [
                '#FFC870',
                '#5AD3D1',
                '#A8B3C5',
                '#616774',
                '#FFD980'
            ]
        }]
    },
    options: {
        indexAxis: 'y', 
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false 
            },
        },
        scales: {
            x: {
                beginAtZero: true
            }
        }
    }
});
