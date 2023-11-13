fetch("/data/employees")
    .then(function (res) {
        return res.json();
    })
    .then(function (data) {
        let labels = [];
        let values = [];
        data.forEach(function (item) {
            labels.push(item.position);
            values.push(item.total);
        });

        const doughnut = {
            labels: labels,
            datasets: [
                {
                    label: "My First Dataset",
                    data: values,
                    backgroundColor: [
                        "rgba(255, 84, 84, 1)",
                        "rgba(42, 133, 255, 1)",
                        "rgba(255, 186, 152, 1)",
                        "rgba(149, 123, 251, 1)",
                        "rgba(0, 232, 149, 1)",
                        "rgba(255, 119, 52, 1)",
                    ],
                    hoverOffset: 4,
                },
            ],
        };

        const config = {
            type: "doughnut",
            data: doughnut,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: "right", // Menggeser legenda ke sebelah kanan
                    },
                },
            },
        };

        var myDoughnut = new Chart(
            document.getElementById("myDoughnut"),
            config
        );
    });
