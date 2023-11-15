


const labels = ['January', 'February', 'March', 'April', 'May', 'June']

  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Numero de Reservaciones',
        data: [12, 19, 3, 5, 13, 3],
        borderWidth: 1
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
