<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
	<legend>Laporan Keuntungan</legend>
<br/>
<br/>
<?php
echo "<script>
      var my_2d= ".json_encode($data)."
    </script>";

?>

<div id='curve_chart'></div>
<script type="text/javascript"
    src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current',{packages:['corechart']})
google.charts.setOnLoadCallback(drawChart);
function drawChart(){
    //var data=new google.visualization
    var data=new google.visualization.DataTable();
    data.addColumn('string','Month');
    data.addColumn('number','sale');
    data.addColumn('number','Profit');
    data.addColumn('number','');
    data.addColumn('number','');
    for(i=0;i<my_2d.length;i++)
data.addRow([my_2d[i][0],parseInt(my_2d[i][1]),parseInt(my_2d[i][2]),
parseInt(my_2d[i][3]),parseInt(my_2d[i][4])]);

var options = {
 title: 'Keuntungan Penjualan',
 curveType: 'function',
width: 800,
 height: 500,
     legend: { position: 'bottom' },
       animation:{'startup':true,
        duration: 5000,
        easing: 'out',
      },
 };
 var chart=new
 google.visualization.BarChart(document.getElementById('curve_chart'))
chart.draw(data,options);
}
</script>


<div id='line_chart'></div>
<script type="text/javascript"
    src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current',{packages:['corechart']})
google.charts.setOnLoadCallback(drawChart);
function drawChart(){
    //var data=new google.visualization
    var data=new google.visualization.DataTable();
    data.addColumn('string','Month');
    data.addColumn('number','sale');
    data.addColumn('number','Profit');
    data.addColumn('number','Exp_fixed');
    data.addColumn('number','Exp_var');
    for(i=0;i<my_2d.length;i++)
data.addRow([my_2d[i][0],parseInt(my_2d[i][1]),parseInt(my_2d[i][2]),
parseInt(my_2d[i][3]),parseInt(my_2d[i][4])]);

var options = {
 title: 'Rasio Penjualan',
 curveType: 'function',
width: 800,
 height: 500,
     legend: { position: 'bottom' },
       animation:{'startup':true,
        duration: 5000,
        easing: 'out',
      },
 };
 var chart=new
 google.visualization.LineChart(document.getElementById('line_chart'))
chart.draw(data,options);
}
</script>

                <table class="table table-bordered" width="60%">
                    <tr>
                        <th>Id Barang</th>
                        <th>Nama Barang</th>
                        <th>Keuntungan Penjualan</th>
                        <th>Keuntungan Setiap Barang</th>
                        <th>Stok</th>
                        <th>Jumlah Penjualan</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($data as $row)
                    {
                        echo "<tr>";
                       
                        echo "<td>".$row['IdBarang']."</td>";
                        echo "<td>".$row['NamaBarang']."</td>";
                        echo "<td>".$row['KeuntunganPenjualan']."</td>";
                        echo "<td>".$row['KeuntunganSetiapBarang']."</td>";
                        echo "<td>".$row['Stok']."</td>";
                        echo "<td>".$row['JumlahPenjualan']."</td>";
                        echo "</tr>";
                       
                    }
                    ?>
                </table>

</div>
