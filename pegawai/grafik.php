          <div class="row">
		    <div class="col-md-12">
			<div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>
              <h3 class="box-title">Alerts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php 
			 $sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, no_hp, nip, tgl_lahir, status, username, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS Umur FROM pegawai WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) AND username=$_SESSION[username];");
			 $ttk=mysqli_fetch_array($sqli); 	
			 $um=58-$ttk['Umur'];
			 if ($ttk['Umur'] <=49){ ?>
				<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>MASA JABATAN ANDA SISA <?php echo $um; ?> TAHUN </h4>
                UMUR ANDA SAAT INI ADALAH <?php echo $ttk[Umur]; ?>, ANDA AKAN SEGERA PENSIUM DALAM WAKTU <?php echo $um; ?> TAHUN
              </div>  
			
			<?php  }else { ?>
				    <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> MASA JABATAN ANDA SISA <?php echo $um; ?> TAHUN </h4>
                <h4>UMUR ANDA SAAT INI ADALAH <?php echo $ttk[Umur]; ?>, ANDA AKAN SEGERA PENSIUM DALAM WAKTU <?php echo $um; ?> TAHUN</h4>
              </div> 
			  <?php
				}
				?>
			
              
          
          
            </div>
            <!-- /.box-body -->
          </div>
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    PROFIL <?=$_SESSION[nama]?>
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item bg-red">
                <span class="time"><i class="fa fa-clock-o"></i> <?=gmdate('H:i:s',time()+60*60*7)?></span>

                <h3 class="timeline-header bg-blue">SILAHKAN LENGKAPI DAHULU PROFIL <?=$_SESSION[nama]?></h3>

                <div class="timeline-body">
                  Selamat Datang Di halaman <?=$_SESSION[nama]?>, Silahkan Pilih menu untuk pengaturan data yang di butuhkan guna mendapatkan hasil yang maksimal sesuai keinginan. Silahkan lengkapi data anda sebelum melanjutkan pengoprasian aplikasi ini
                </div>
                <div class="timeline-footer">
                  <a href="index.php?aksi=editpegawai&id_pegawai=<?=$_SESSION['id']?>" class="btn btn-primary">Lengkapi Data</a>
             
                </div>
              </div>
            </li>
            <!-- END timeline item -->
      
  
            <!-- END timeline item -->
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                   Cara Pengunaan Aplikasi
                  </span>
            </li>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <li>
              <i class="fa fa-video-camera bg-maroon"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i><?=gmdate('H:i:s',time()+60*60*7)?></span>

                <h3 class="timeline-header"><a href="#">Selamata datang</a> <?=$_SESSION[nama]?></h3>

                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                            frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
        
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
            </div>
