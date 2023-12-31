const doughnut = {
    labels: [
      'Developer',
      'UI/UX Designer',
      'Human Resources',
      'Marketing',
      'Admin',
      'Grafik Design'
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [25, 40, 45, 50, 20, 44],
      backgroundColor: [
        'rgba(255, 84, 84, 1)',
        'rgba(42, 133, 255, 1)',
        'rgba(255, 186, 152, 1)',
        'rgba(149, 123, 251, 1)',
        'rgba(0, 232, 149, 1)',
        'rgba(255, 119, 52, 1)'
        
      ],
      hoverOffset: 4
    }]
  };

const config = {
    type: 'doughnut',
    data: doughnut,
    options: {
        plugins: {
            legend: {
                position: 'right', // Menggeser legenda ke sebelah kanan
            }
        }
    }
  };
  
var myDoughnut = new Chart(
    document.getElementById('myDoughnut'),
    config
);
