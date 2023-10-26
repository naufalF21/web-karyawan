const line = {
    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "6"],
    datasets: [
        {
            label: "Present",
            data: [55, 60, 55, 60, 55, 60, 55],
            borderColor: "#2A85FF",
            fill: false,
            cubicInterpolationMode: "monotone",
        },
        {
            label: "Absent",
            data: [40, 50, 40, 50, 40, 55, 40],
            borderColor: "#36a2eb",
            fill: false,
            cubicInterpolationMode: "monotone",
        },
        {
            label: "Overtime",
            data: [30, 40, 30, 40, 30, 45, 30],
            borderColor: "#ff6384",
            fill: false,
            cubicInterpolationMode: "monotone",
        },
    ],
};

const configLine = {
    type: "line",
    data: line,
    options: {
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
            },
            legend: {
                position: "right", // Menggeser legenda ke sebelah kanan
            },
        },
        scales: {
            x: {
                title: {
                    display: true,
                },
            },
            y: {
                title: {
                    display: true,
                },
            },
        },
    },
};

var myLine = new Chart(document.getElementById("myLine"), configLine);

// var ctx = document.getElementById('myLine').getContext('2d');

// const config = new Chart(ctx, {
//     type: 'line',
//     data: data,
//     options: {
//       responsive: true,
//       plugins: {
//         title: {
//           display: true,
//           text: 'Chart.js Line Chart - Cubic interpolation mode'
//         },
//       },
//       interaction: {
//         intersect: false,
//       },
//       scales: {
//         x: {
//           display: true,
//           title: {
//             display: true
//           }
//         },
//         y: {
//           display: true,
//           title: {
//             display: true,
//             text: 'Value'
//           },
//           suggestedMin: -10,
//           suggestedMax: 200
//         }
//       }
//     },
//   });

// const DATA_COUNT = 12;
// const labels = [];
// for (let i = 0; i < DATA_COUNT; ++i) {
//   labels.push(i.toString());
// }
// const datapoints = [0, 20, 20, 60, 60, 120, NaN, 180, 120, 125, 105, 110, 170];
// const data = {
//   labels: labels,
//   datasets: [
//     {
//       label: 'Cubic interpolation (monotone)',
//       data: datapoints,
//       borderColor: Utils.CHART_COLORS.red,
//       fill: false,
//       cubicInterpolationMode: 'monotone',
//       tension: 0.4
//     }, {
//       label: 'Cubic interpolation',
//       data: datapoints,
//       borderColor: Utils.CHART_COLORS.blue,
//       fill: false,
//       tension: 0.4
//     }, {
//       label: 'Linear interpolation (default)',
//       data: datapoints,
//       borderColor: Utils.CHART_COLORS.green,
//       fill: false
//     }
//   ]
// };
