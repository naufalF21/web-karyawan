fetch("/data/leaves")
    .then(function (res) {
        return res.json();
    })
    .then(function (data) {
        let cuti = data.cuti;
        let lembur = data.lembur;
        let labels = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        let cutiValues = [0, 0, 0, 0, 0, 0, 0];
        let lemburValues = [0, 0, 0, 0, 0, 0, 0];

        cuti.forEach(function (item) {
            let tanggal = item.tanggal;
            let nilai = item.total;
            let hari = new Date(tanggal).getDay();

            cutiValues[hari] += nilai;
        });

        lembur.forEach(function (item) {
            let tanggal = item.tanggal_lembur;
            let nilai = item.total;
            let hari = new Date(tanggal).getDay();

            lemburValues[hari] += nilai;
        });

        const configBar = {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Leave",
                        data: cutiValues,
                        backgroundColor: "rgba(42, 133, 255, 1)", // Warna area
                    },
                    {
                        label: "Overtime",
                        data: lemburValues,
                        backgroundColor: "rgba(177, 229, 252, 1)", // Warna area
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        stacked: true, // Mengaktifkan stacking di sumbu X
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
    });
