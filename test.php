<?php

require_once "config.php";

$select_post = "SELECT * FROM overall ORDER BY 1 DESC";

$query_post = mysqli_query($conn, $select_post);

$department2 = array();
$p_per_month2 = array();

while ($row = mysqli_fetch_array($query_post)) {
    $department = $row['department'];
    $hour_per_day = $row['hour_per_day'];
    $p_per_hour = $row['p_per_hour'];
    $p_per_day = $row['p_per_day'];
    $cost_per_day = $row['cost_per_day'];
    $p_per_month = $row['p_per_month'];
    $cost_per_month = $row['cost_per_month'];
    $department2[] = "\"" . $row['department'] . "\"";
    $p_per_month2[] = "\"" . $row['p_per_month'] . "\"";
}
$department2 = implode(",", $department2);
$p_per_month2 = implode(",", $p_per_month2);

?>

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
                labels: [<?php echo $department2; ?>

                ],
                datasets: [{
                    label: 'Power use per day (kWh)',
                    data: [<?php echo $p_per_month2; ?>],
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



<h>กราฟเเสดงการใช้ไฟของเเต่ละแผนกในเเต่ละเดือน</h>
<table class="table table-bordered">
    <tr>
        <th>Department</th>
        <th>จำนวนชั่วโมงการใช้ไฟฟ้าวันนี้( ชั่วโมง )</th>
        <th>ไฟฟ้าที่ใช้ไป ( เฉลี่ย / ชั่วโมง )( kWh )</th>
        <th>ไฟฟ้าที่ใช้ไปในวันนี้( kWh )</th>
        <th>คิดเป็นจำนวนเงินในวันนี้( บาท )</th>
        <th>เดือนนี้ใช้ไป( MWh )</th>
        <th>คิดเป็นจำนวนเงินในเดือนนี้( บาท )</th>
    </tr>
    
    <tr>
        <td><?php echo $department; ?></td>
        <td><?php echo $hour_per_day = number_format($hour_per_day, 2) . "<br>"; ?></td>
        <td><?php echo $p_per_hour = number_format($p_per_hour, 2) . "<br>"; ?></td>
        <td><?php echo $p_per_day = number_format($p_per_day, 2) . "<br>"; ?></td>
        <td><?php echo $cost_per_day = number_format($cost_per_day, 2) . "<br>"; ?></td>
        <td><?php echo $p_per_month = number_format($p_per_month, 2) . "<br>"; ?></td>
        <td><?php echo $cost_per_month = number_format($cost_per_month, 2) . "<br>"; ?></td>
        <!-- <td><img width="80" height="80" src="../img/<?php echo $post_image; ?>" </td> <td><?php echo $post_content; ?></td>
                                    <td><a href="delete.php?del=<?php echo $post_id; ?>">Delete</a></td>
                                    <td><a href="edit_post.php?edit=<?php echo $post_id; ?>">Edit</a></td> -->
    </tr>


</table>