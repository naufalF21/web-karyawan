const labels = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
const dataset1 = [10, 20, 30, 40, 50, 55];
const dataset2 = [15, 25, 35, 45, 55, 60];

const configBar = {
    type: "bar",
    data: {
        labels: labels,
        datasets: [
            {
                label: "Dataset 1",
                data: dataset1,
                backgroundColor: "rgba(42, 133, 255, 1)", // Warna area
                // borderColor: 'rgba(255, 99, 132, 1)', // Warna garis batas
                // borderWidth: 1 // Ketebalan garis batas
            },
            {
                label: "Dataset 2",
                data: dataset2,
                backgroundColor: "rgba(177, 229, 252, 1)", // Warna area
                // borderColor: 'rgba(54, 162, 235, 1)', // Warna garis batas
                // borderWidth: 1 // Ketebalan garis batas
            },
        ],
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            x: {
                stacked: true, // Mengaktifkan stacking di sumbu X
                // position: 'top'
            },
            y: {
                stacked: true, // Mengaktifkan stacking di sumbu Y
            },
        },
        plugins: {
            legend: {
                position: "right", // Menggeser legenda ke sebelah kanan
            },
        },
    },
};

// Membuat grafik menggunakan Chart.js
var myBarStacked = new Chart(
    document.getElementById("myBarStacked"),
    configBar
);
