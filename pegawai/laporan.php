 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan </title>
	 <link rel="stylesheet" href="../sys/bootstrap/bootstrap/css/bootstrap.min.css">
	 
 	<?php include '../koneksi.php'; ?>
 </head>
 <body>

 	<style type="text/css">
 		.table-tanggal tr th, .table-tanggal tr td{
 			padding: 5px;
 		}
 	</style>
<?php if($_GET['aksi']=='jabatan'){ ?>
	<div class='row'>
	<div class='col-lg-12'>	<center>
<h4>LAPORAN </h4>
</center>	
<table class="table table-bordered table-striped" id="table-datatable">		
						<thead>
							<tr>
							<th>No</th>
								<th>Nama jabatan</th>
								<th>Jumlah</th>			  
						  </tr></thead>
		<tbody>
<?php
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.jabatan) as jlh,jabatan.id_jabatan,jabatan.nama_jabatan FROM jabatan LEFT JOIN pegawai ON pegawai.jabatan = jabatan.id_jabatan GROUP BY jabatan.id_jabatan ORDER BY id_jabatan ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
						echo"<tr>
							<td>$no</td>
								<td>$t[nama_jabatan]</td>
								<td>$t[jlh]</td>
				
							</tr>";
} ?>
		 </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
   </div>				
<?php } ?>	 

<?php if($_GET['aksi']=='golongan'){ ?>
	<div class='row'>
                <div class='col-lg-12'>	<center>
 		<h4>LAPORAN </h4>
 	</center>	
	 <table class="table table-bordered table-striped" id="table-datatable">
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama golongan</th>
                                            <th>Jumlah</th>		  
                                      </tr></thead>
                    <tbody>
<?php			
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.gol) as jlh,golongan.id_gol,golongan.nama_gol FROM golongan LEFT JOIN pegawai ON pegawai.gol = golongan.id_gol GROUP BY golongan.id_gol ORDER BY id_gol ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_gol]</td>
                                            <td>$t[jlh]</td>
						
                                        </tr>";
} ?>
        </tbody>
                                </table>
								</div>
               </div>	
<?php }?>	 

<?php if($_GET['aksi']=='pendidikan'){ ?>
	<div class='row'>
                <div class='col-lg-12'>	<center>
 		<h4>LAPORAN </h4>
 	</center>	
	 <table class="table table-bordered table-striped" id="table-datatable">
                                    <thead>
                                        <tr> <th>No</th>
                                            <th>Jenjang</th>
                                            <th>Jumlah</th>
                                            <th>Profesi</th>		  
                                        </tr>
                                    </thead><tbody>
			
	<?php		
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.tingkat) as jlh,pendidikan.id_pen,pendidikan.jenjang,pendidikan.profesi FROM pendidikan LEFT JOIN pegawai ON pegawai.tingkat = pendidikan.id_pen GROUP BY pendidikan.id_pen ORDER BY id_pen ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"
                                        <tr><td>$no</td>
                                            <td>$t[jenjang]</td>
                                            <td>$t[jlh]</td>
							<td>$t[profesi]</td>
                                        </tr>";
}?>
                                    </tbody></table>
									</div>
               </div>								
<?php } ?>
<?php if($_GET['aksi']=='pegawai'){ ?>
	<div class='row'>
                <div class='col-lg-12'> 	<center>
 		<h4>LAPORAN </h4>
 	</center>
 		<br>
 		<table class="table table-bordered table-striped" id="table-datatable">
 			<thead>
 				<tr>
 					<th >NO</th>
 					<th class="text-center">Nama</th>
					<th class="text-center">Nip</th>
 					<th class="text-center">Status Pegawai</th>
					 <th class="text-center">HP</th>
 					<th class="text-center">Umur</th>
 					<th class="text-center">Status Pesiun</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 			$no=0;
$sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, no_hp, nip, tgl_lahir,status, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM pegawai");
while ($d=mysqli_fetch_array($sqli)){	
$um=58-$d['umur'];
$no++;
 					?>
 					<tr>
 						<td class="text-center"><?php echo $no ; ?></td>
 						<td class="text-center"><?php echo $d['nama_pegawai']; ?></td>
						<td class="text-center"><?php echo $d['nip']; ?></td>
 						<td class="text-center"><?php echo $d['status']; ?></td>
						 <td class="text-center"><?php echo $d['no_hp']; ?></td>
 						<td class="text-center"><?php echo $d['umur']; ?></td>
 						<td class="text-center">Sisa <?php echo $um; ?> Tahun</td>
 					</tr>
 					<?php 
 				}
 				?>
 			</tbody>
 		</table>
		 </div>
               </div>	
<?php     } ?>

<?php if($_GET['aksi']=='pegawaipns'){ ?>
	<div class='row'>
                <div class='col-lg-12'> 	<center>
 		<h4>LAPORAN </h4>
 	</center>
 		<br>
 		<table class="table table-bordered table-striped" id="table-datatable">
 			<thead>
 				<tr>
 					<th >NO</th>
 					<th class="text-center">Nama</th>
					<th class="text-center">Nip</th>
 					<th class="text-center">Status Pegawai</th>
					 <th class="text-center">HP</th>
 					<th class="text-center">Umur</th>
 					<th class="text-center">Status Pesiun</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 			$no=0;
$sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, no_hp, nip, tgl_lahir,status, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM pegawai  WHERE status='$_GET[status]'");
while ($d=mysqli_fetch_array($sqli)){	
$um=58-$d['umur'];
$no++;
 					?>
 					<tr>
 						<td class="text-center"><?php echo $no ; ?></td>
 						<td class="text-center"><?php echo $d['nama_pegawai']; ?></td>
						<td class="text-center"><?php echo $d['nip']; ?></td>
 						<td class="text-center"><?php echo $d['status']; ?></td>
						 <td class="text-center"><?php echo $d['no_hp']; ?></td>
 						<td class="text-center"><?php echo $d['umur']; ?></td>
 						<td class="text-center">Sisa <?php echo $um; ?> Tahun</td>
 					</tr>
 					<?php 
 				}
 				?>
 			</tbody>
 		</table>
		 </div>
               </div>	
<?php     } ?>
<?php if($_GET['aksi']=='pegawaijk'){ ?>
	<div class='row'>
                <div class='col-lg-12'> 	<center>
 		<h4>LAPORAN </h4>
 	</center>
 		<br>
 		<table class="table table-bordered table-striped" id="table-datatable">
 			<thead>
 				<tr>
 					<th >NO</th>
 					<th class="text-center">Nama</th>
					<th class="text-center">Nip</th>
 					<th class="text-center">Status Pegawai</th>
					 <th class="text-center">HP</th>
 					<th class="text-center">Umur</th>
 					<th class="text-center">Status Pesiun</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 			$no=0;
$sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, no_hp, nip, tgl_lahir,status, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM pegawai  WHERE jenis_kelamin='$_GET[jenis_kelamin]'");
while ($d=mysqli_fetch_array($sqli)){	
$um=58-$d['umur'];
$no++;
 					?>
 					<tr>
 						<td class="text-center"><?php echo $no ; ?></td>
 						<td class="text-center"><?php echo $d['nama_pegawai']; ?></td>
						<td class="text-center"><?php echo $d['nip']; ?></td>
 						<td class="text-center"><?php echo $d['status']; ?></td>
						 <td class="text-center"><?php echo $d['no_hp']; ?></td>
 						<td class="text-center"><?php echo $d['umur']; ?></td>
 						<td class="text-center">Sisa <?php echo $um; ?> Tahun</td>
 					</tr>
 					<?php 
 				}
 				?>
 			</tbody>
 		</table>
		 </div>
               </div>	
<?php     } ?>
<?php if($_GET['aksi']=='pegawaipensiun'){ ?>
	<div class='row'>
                <div class='col-lg-12'> 	<center>
 		<h4>LAPORAN </h4>
 	</center>
 		<br>
 		<table class="table table-bordered table-striped" id="table-datatable">
 			<thead>
 				<tr>
 					<th >NO</th>
 					<th class="text-center">Nama</th>
					<th class="text-center">Nip</th>
 					<th class="text-center">Status Pegawai</th>
					 <th class="text-center">HP</th>
 					<th class="text-center">Umur</th>
 					<th class="text-center">Status Pesiun</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 			$no=0;
			 $sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, no_hp, nip, tgl_lahir,status, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS Umur FROM pegawai WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) >= 56;");
				while ($d=mysqli_fetch_array($sqli)){	
					$um=58-$d['Umur'];
				$no++;?>
 					<tr>
 						<td class="text-center"><?php echo $no ; ?></td>
 						<td class="text-center"><?php echo $d['nama_pegawai']; ?></td>
						<td class="text-center"><?php echo $d['nip']; ?></td>
 						<td class="text-center"><?php echo $d['status']; ?></td>
						 <td class="text-center"><?php echo $d['no_hp']; ?></td>
 						<td class="text-center"><?php echo $d['Umur']; ?></td>
 						<td class="text-center">Sisa <?php echo $um; ?> Tahun</td>
 					</tr>
 					<?php 
 				}
 				?>
 			</tbody>
 		</table>
		 </div>
               </div>	
<?php     } ?>

<?php if($_GET['aksi']=='pangkujabatan'){ ?>
<?php	$sqli = mysqli_query($koneksi,"SELECT * FROM pemangkujabatan,pemangku,pegawai WHERE pemangkujabatan.id_pegawai=pegawai.id_pegawai AND pemangkujabatan.id_pkjab=pemangku.id_pkjab AND id_pangku=$_GET[id_pangku] ");
        $t=mysqli_fetch_array($sqli); 	?>
	<center>
 		<h4>Laporan Pemangku Jabatan <?=$t[nama_pkjab]?> <?=$k_k[nama]?></h4>
 	</center>
 		<br>

	<table class="table table-bordered table-striped" id="table-datatable">
  <tr>
    <td><p >Nama</p></td>
    <td><?=$t[nama_pegawai]?></td>
  </tr>
  <tr>
    <td><p >Alamat</p></td>
    <td><?=$t[alamat]?></td>
  </tr>
  <tr>
    <td><p >No Telepon</p></td>
    <td><?=$t[no_hp]?></td>
  </tr>
  <tr>
    <td><p >Email</p></td>
    <td><?=$t[email]?></td>
  </tr>
  <tr>
    <td colspan="2"><p >Surat Keputusan Bupati Pesawaran</p></td>
  </tr>
  <tr>
    <td><p >Nomor</p></td>
    <td><?=$t[nomor_surat]?></td>
  </tr>
  <tr>
    <td><p >Tanggal</p></td>
    <td><?=$t[tanggal_surat]?></td>
  </tr>
</table>
<?php     } ?>
 	<script>
 		window.print();
 		$(document).ready(function(){

 		});
 	</script>

 </body>
 </html>
