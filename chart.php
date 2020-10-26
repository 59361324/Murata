<?php
require_once "config.php";
?>

<div>
    <?php
    $select_post = "SELECT * FROM overall";
    // $result = mysqli_query($conn, $query);
    $query_post = mysqli_query($conn, $select_post);
    //for chart
    $department = array();
    $p_per_month = array();
    while ($rs = mysqli_fetch_array($query_post)) {
        $department[] = "\"" . $rs['department'] . "\"";
        $p_per_month[] = "\"" . $rs['p_per_month'] . "\"";
    }
    $department = implode(",", $department);
    $p_per_month = implode(",", $p_per_month);

    ?>
    <h3 align="center">รายงานการใช้ไฟ</h3>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <hr>
    <p align="center">
        <!--devbanban.com-->
        <canvas id="myChart" width="800px" height="300px"></canvas>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php echo $department; ?>

                    ],
                    datasets: [{
                        label: 'Power use per day (kWh)',
                        data: [<?php echo $p_per_month; ?>],
                        backgroundColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1.0)',
                            'rgba(75, 192, 192, 1.0)',
                            'rgba(153, 102, 255, 1.0)',
                            'rgba(255, 159, 64, 1.0)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </p>

    <?php mysqli_close($conn); ?>
</div>