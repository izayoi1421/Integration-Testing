<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_pending; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('admin/role'); ?>">View &rarr;</a></small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">On Process</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_process; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('menu'); ?>">View &rarr;</a></small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Settled</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_settled; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('admin/datamember'); ?>">View &rarr;</a></small>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dismiss</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_dismiss; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('menu/submenu'); ?>">View &rarr;</a></small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Endorsed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_endorsed; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('menu/submenu'); ?>">View &rarr;</a></small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cancelled</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_cancelled; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
                <small><a class="ml-3" href="<?= base_url('menu/submenu'); ?>">View &rarr;</a></small>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="card-body">
    <!-- Page Heading -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <form action="" method="post" enctype="multipart/form-data">
    <p>Summary of Report: <button class="badge badge-danger" style="font-size:14px;" onclick="openTab()"><i class="fas fa-file-pdf"></i> PDF File</button></p>
    </form>
    <br>
    <div class="row">
        <div class="col-xl-2 col-md-8 mb-4  ">

            <?php foreach ($analytics as $i)
                $typeIn[] = $i['type'];
            ?>
            <?           ?>
            <?php foreach ($analytics as $i)
                $typecount[] = $i['tcount'];
            ?>
            <div class="chart-container" style="position: relative; height:60vh; width:70vw;">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2 col-md-8 mb-4  ">


            <?php foreach ($analyticsmonth as $j)
                $month[] =  $j['month'];
            ?>

            <?php foreach ($analyticsmonth as $j)
                $mcount[] =  $j['mcount'];

            ?>

            <div class="chart-container" style="position: relative; height:60vh; width:70vw;">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2 col-md-8 mb-4  ">


            <?php foreach ($analyticsrecord as $j)
                $month_action[] =  $j['record'];
            ?>

            <?php foreach ($analyticsrecord as $j)
                $c_action[] =  $j['c_action'];
            ?>

            <div class="chart-container" style="position: relative; height:60vh; width:70vw;">
                <canvas id="myChart3"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2 col-md-8 mb-4  ">


            <?php foreach ($analyticscomplaintrecord as $j)
                $month_complaint[] =  $j['complaint'];
            ?>

            <?php foreach ($analyticscomplaintrecord as $j)
                $scount[] =  $j['scount'];
            ?>

            <div class="chart-container" style="position: relative; height:60vh; width:70vw;">
                <canvas id="myChart4"></canvas>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>

<script>
    chart.canvas.parentNode.style.height = '18px';
    chart.canvas.parentNode.style.width = '18px';
</script>
<style>
    canvas#myChart {
        background-color: #f9f6f2;
        border-style: solid;
    }

    canvas#myChart2 {
        background-color: #f9f6f2;
        border-style: solid;
    }

    canvas#myChart3 {
        background-color: #f9f6f2;
        border-style: solid;
    }
</style>

<script>
    //Most type of report
    const data = {
        labels: <?php echo json_encode($typeIn) ?>,
        datasets: [{
            label: 'Type of Reports',
            borderWidth: 1,
            backgroundColor: ['rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(33, 33, 33, 0.8)'
            ],
            borderColor: ['rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(33, 33, 33, 1)'
            ],

            data: <?php echo json_encode($typecount) ?>,
        }],
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    onClick: (evt, legendItem, legend) => {
                        const index = legend.chart.data.labels.indexOf(legendItem.text);
                        legend.chart.toggleDataVisibility(index);
                        legend.chart.update();
                    },
                    labels: {
                        generateLabels: (mychart) => {
                            let visibility = [];
                            for (let i = 0; i < mychart.data.labels.length; i++) {
                                if (mychart.getDataVisibility(i) === true) {
                                    visibility.push(false)
                                } else {
                                    visibility.push(true)
                                }
                            };
                            return mychart.data.labels.map(
                                (label, index) => ({
                                    text: label,
                                    strokeStyle: mychart.data.datasets[0].borderColor[index],
                                    fillStyle: mychart.data.datasets[0].backgroundColor[index],
                                    hidden: visibility[index]
                                })
                            )
                        }
                    }
                }
            }
        }
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    //Most Monthh reportt
    const data2 = {
        labels: <?php echo json_encode($month) ?>,
        datasets: [{
            label: 'Filed Complaint',
            borderWidth: 1,
            backgroundColor: ['rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: ['rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],

            data: <?php echo json_encode($mcount) ?>,
        }],
    };


    const config2 = {
        type: 'bar',
        data: data2,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    onClick: (evt, legendItem, legend) => {
                        const index = legend.chart.data.labels.indexOf(legendItem.text);
                        legend.chart.toggleDataVisibility(index);
                        legend.chart.update();
                    },
                    labels: {
                        generateLabels: (mychart) => {
                            let visibility = [];
                            for (let i = 0; i < mychart.data.labels.length; i++) {
                                if (mychart.getDataVisibility(i) === true) {
                                    visibility.push(false)
                                } else {
                                    visibility.push(true)
                                }
                            };
                            return mychart.data.labels.map(
                                (label, index) => ({
                                    text: label,
                                    strokeStyle: mychart.data.datasets[0].borderColor[index],
                                    fillStyle: mychart.data.datasets[0].backgroundColor[index],
                                    hidden: visibility[index]
                                })
                            )
                        }
                    }
                }
            }
        }
    };

    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );

    //Most Record reportt
    const data3 = {
        labels: <?php echo json_encode($month_action) ?>,
        datasets: [{
            label: 'Counted',
            borderWidth: 1,
            backgroundColor: ['rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: ['rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],

            data: <?php echo json_encode($c_action) ?>,
        }],
    };


    const config3 = {
        type: 'bar',
        data: data3,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    onClick: (evt, legendItem, legend) => {
                        const index = legend.chart.data.labels.indexOf(legendItem.text);
                        legend.chart.toggleDataVisibility(index);
                        legend.chart.update();
                    },
                    labels: {
                        generateLabels: (mychart) => {
                            let visibility = [];
                            for (let i = 0; i < mychart.data.labels.length; i++) {
                                if (mychart.getDataVisibility(i) === true) {
                                    visibility.push(false)
                                } else {
                                    visibility.push(true)
                                }
                            };
                            return mychart.data.labels.map(
                                (label, index) => ({
                                    text: label,
                                    strokeStyle: mychart.data.datasets[0].borderColor[index],
                                    fillStyle: mychart.data.datasets[0].backgroundColor[index],
                                    hidden: visibility[index]
                                })
                            )
                        }
                    }
                }
            }
        }
    };

    const myChart3 = new Chart(
        document.getElementById('myChart3'),
        config3
    );

    //Most Record reportt
    const data4 = {
        labels: <?php echo json_encode($month_complaint) ?>,
        datasets: [{
            label: 'Counted',
            borderWidth: 1,
            backgroundColor: ['rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: ['rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],

            data: <?php echo json_encode($scount) ?>,
        }],
    };


    const config4 = {
        type: 'bar',
        data: data4,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    onClick: (evt, legendItem, legend) => {
                        const index = legend.chart.data.labels.indexOf(legendItem.text);
                        legend.chart.toggleDataVisibility(index);
                        legend.chart.update();
                    },
                    labels: {
                        generateLabels: (mychart) => {
                            let visibility = [];
                            for (let i = 0; i < mychart.data.labels.length; i++) {
                                if (mychart.getDataVisibility(i) === true) {
                                    visibility.push(false)
                                } else {
                                    visibility.push(true)
                                }
                            };
                            return mychart.data.labels.map(
                                (label, index) => ({
                                    text: label,
                                    strokeStyle: mychart.data.datasets[0].borderColor[index],
                                    fillStyle: mychart.data.datasets[0].backgroundColor[index],
                                    hidden: visibility[index]
                                })
                            )
                        }
                    }
                }
            }
        }
    };

    const myChart4 = new Chart(
        document.getElementById('myChart4'),
        config4
    );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function openTab() {
        window.open('<?= site_url('admin/analytics_pdf'); ?>', '_blank');
    }


</script>
</div>
</div>
<!-- End of Main Content -->
<style>
    canvas {
        border: 1px dotted red;
    }
</style>