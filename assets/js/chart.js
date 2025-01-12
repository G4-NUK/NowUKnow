const barDailyActiveUsers = document.getElementById('dailyActiveUsers');
const ctxrankingTags = document.getElementById('rankingTags');
const ctxrankingUsers = document.getElementById('rankingUsers');

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
    type: 'doughnut',
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
            hoverOffset: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false, 
        plugins: {
            legend: {
                position: 'right',
            }
        },
    }
});
new Chart(ctxrankingUsers, {
    type: 'doughnut',
    data: {
        labels: ['Jermaine', 'Jerome', 'Joseph', 'Chan', 'Johann', 'Cindy', 'Tm', 'Kent'],
        datasets: [{
            data: [33.1, 24.8, 16.5, 8.3, 5.8, 4.1, 4.1, 3.3],
            backgroundColor: [
                '#5DA5DA',
                '#FAA43A',
                '#60BD68',
                '#F17CB0',
                '#B2912F',
                '#B276B2',
                '#DECF3F',
                '#F15854'
            ],
            hoverOffset: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right',
            }
        },
    }
});