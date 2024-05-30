
  <head>

    <link rel="stylesheet" href="../sys/bootstrap/plugins/morris/morris.css">
<link rel="stylesheet" href="../sys/bootstrap/ionicons.min.css">
  </head>
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">  <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM  aset WHERE id_kategori='1' AND kondisi='BAIK'");
            while ($t=mysqli_fetch_array($data)){ 
              $subpc   = $t[jumlah];
             $totalpc      = $totalpc + $subpc;
            } ?>
                  <h3><?php echo "".number_format($totalpc)."" ?></h3>
                  <p>JUMLAH PC </p>
                </div>
                <div class="icon">
                  <i class="fa fa-group"></i>
                </div>
                <a href="laporan.php?aksi=pegawaipns&status=PNS" target='_blank' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM  aset WHERE id_kategori='10' AND kondisi='BAIK'");
            while ($t=mysqli_fetch_array($data)){ 
              $subtotal    = $t[jumlah];
             $monitor      = $monitor + $subtotal;
            } ?>
                  <h3><?php echo "".number_format($monitor)."" ?></h3>
                  <p>JUMLAH MONITOR</p>
                </div>
                <div class="icon">
                  <i class="fa fa-group"></i>
                </div>
                <a href="laporan.php?aksi=pegawaipns&status=P3K" target='_blank' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM  aset WHERE id_kategori='11' AND kondisi='BAIK'");
            while ($t=mysqli_fetch_array($data)){ 
              $subtotal    = $t[jumlah];
             $printer      = $printer + $subtotal;
            } ?>
                    <h3><?php echo "".number_format($printer)."" ?></h3>
                  <p>JUMLAH PRINTER</p>
                </div>
                <div class="icon">
                  <i class="fa fa-group"></i>
                </div>
                <a href="laporan.php?aksi=pegawaipns&status=TKS" target='_blank' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
           <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-orange">
                <div class="inner">
                <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM  aset WHERE id_kategori='9' AND kondisi='BAIK'");
            while ($t=mysqli_fetch_array($data)){ 
              $subtotal    = $t[jumlah];
             $projektor      = $projektor + $subtotal;
            } ?>
                    <h3><?php echo "".number_format($projektor)."" ?></h3>
                  <p>JUMLAH PROJEKTOR</p>
                </div>
                <div class="icon">
                  <i class="fa fa-group"></i>
                </div>
                <a href="laporan.php?aksi=pegawaipns&status=THLS" target='_blank' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM  aset WHERE id_kategori='8' AND kondisi='BAIK'");
            while ($t=mysqli_fetch_array($data)){ 
              $subtotal    = $t[jumlah];
             $wifi      = $wifi + $subtotal;
            } ?>
                  <h3><?php echo "".number_format($wifi)."" ?></h3>
                  <p>JUMLAH WAFFI</p>
                </div>
                <div class="icon">
                  <i class="fa fa-male"></i>
                </div>
                <a href="laporan.php?aksi=pegawaijk&jenis_kelamin=Laki-Laki" target='_blank' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM  aset WHERE id_kategori='8' AND kondisi='BAIK'");
            while ($t=mysqli_fetch_array($data)){ 
              $subtotal    = $t[jumlah];
             $LP      = $LP + $subtotal;
            } ?>
                  <h3><?php echo "".number_format($LP)."" ?></h3>
                  <p>JUMLAH LEBTOP</p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="laporan.php?aksi=pegawaijk&jenis_kelamin=Perempuan" target='_blank' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
				    <?php 
             $sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, nip, tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS Umur FROM pegawai WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) >= 56;");
             $d=mysqli_num_rows($sqli);
            ?>
                  <h3><?php echo "".number_format($d)."" ?></h3>
                  <p>DATA ASET RUSAK</p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="laporan.php?aksi=pegawaipensiun" target='_blank' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
				<?php 
             $data = mysqli_query($koneksi,"SELECT * FROM  aset");
			$p=mysqli_num_rows($data);
            ?>
                  <h3><?php echo "".number_format($p)."" ?></h3>
                  <p>KATEGORI ASET</p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="laporan.php?aksi=pegawai" target='_blank' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
    
          <div class="row">
            <div class="col-md-6">
              <!-- AREA CHART -->
                <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Grafik Pembelian Aset</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <div class="chart" id="bar-chart" style="height: 300px;"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    
             

            </div><!-- /.col (LEFT) -->
            <div class="col-md-6">
			 <!-- DONUT CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Grafik jumlah aset</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (RIGHT) -->
          </div><!-- /.row -->

    <!-- jQuery 2.1.4 -->
    <script src="../sys/bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
   
    <!-- Morris.js charts -->
    <script src="../sys/bootstrap/raphael-min.js"></script>
    <script src="../sys/bootstrap/plugins/morris/morris.min.js"></script>
    <!-- FastClick -->

    <script>
      $(function () {
        "use strict";



     
        //DONUT CHART
        var donut = new Morris.Donut({
          element: 'sales-chart',
          resize: true,
          colors: ["#3c8dbc", "#f56954", "#00a65a","#f47721", "#1d437f", "#5fafc5", "#fbc727"],
          data: [
            <?php 
            $sql=mysqli_query($koneksi,"SELECT * FROM aset ORDER BY id_aset ASC");
            while ($t=mysqli_fetch_array($sql)){ 
              echo "{label: '" . $t['nama_aset'] . "', value: " . $t['jumlah'] . "},";
            }
            ?>
          ],
          hideHover: 'auto'
        });
        //BAR CHART
        var bar = new Morris.Bar({
          element: 'bar-chart',
          resize: true,
          data: [<?php
$usia ="SELECT nama_aset, tgl_beli,jumlah, TIMESTAMPDIFF(YEAR, tgl_beli, CURDATE()) AS umur FROM aset";
$rekapumur=mysqli_query($koneksi,"
SELECT 
tgl_beli,
SUM(jumlah) as total_jumlah
FROM aset
GROUP BY tgl_beli");
while ($dataumur=mysqli_fetch_array($rekapumur)){
  echo "{tgl_beli: '" . $dataumur['tgl_beli'] . "', total_jumlah: " . $dataumur['total_jumlah'] . "},";
}
?>
          ],
          xkey: 'tgl_beli',
          ykeys: ['total_jumlah'],
          labels: ['Jumlah ASET'],
          barColors: ['#00a65a'],
          hideHover: 'auto'
        });
      });
    </script>
  </body>
</html>
