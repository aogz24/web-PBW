const data = {
    labels: [
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    ],
    datasets: [{
        label: 'Hari bisa',
        data: [1, 5, 1,5,8,2,1],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(20,215,0)',
        'rgb(191,0,255)',
        'rgb(255,0,0)',
        'rgb(0,0,255)'
        ],
        hoverOffset: 4
    }]
    };
    const config = {
        type: 'pie',
        data: data,
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
        );