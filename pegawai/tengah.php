<?php
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='home'){
include "grafik.php";
}
elseif($_GET['aksi']=='ikon'){
include "../ikon.php";
}
elseif($_GET['aksi']=='pegawai'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
	
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama pegawai</th>
                                            <th>Umur</th>
                                            <th>NIP</th>		  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, nip, tgl_lahir,username, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM pegawai WHERE username=$_SESSION[username]");
while ($t=mysqli_fetch_array($sqli)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_pegawai] </td>
                                            <td>$t[umur]</td>
							<td>$t[nip]</td>
                                        </tr>";
}
                                  echo"  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>		
	
	  ";			
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editpegawai'){
$tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE id_pegawai=$_GET[id_pegawai] ");
$t=mysqli_fetch_array($tebaru);
echo"  <div class='row'>
 <form id='form1'  method='post' action='edit.php?aksi=proseseditpegawai&id_pegawai=$t[id_pegawai]'>       <!-- /.col -->
        <div class='col-md-12'>
          <div class='nav-tabs-custom'>
            <ul class='nav nav-tabs'>
              <li class='active'><a href='#activity' data-toggle='tab'>Data Pribadi</a></li>
              <li><a href='#settings' data-toggle='tab'>Data Pendidikan </a></li>
			  <li><a href='#cpns' data-toggle='tab'>Data Jabatan</a></li>
			  
            </ul>
            <div class='tab-content'>
              <div class='active tab-pane' id='activity'>
                <!-- Post -->
			                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_pegawai]
                        </div>
                        <div class='panel-body'>
	<div class='col-md-3'>					
        <label>Nama pegawai</label>
        <input type='text' class='form-control' value='$t[nama_pegawai]' name='nama_pegawai'/><br>
	<label>Nip pegawai</label>
        <input type='text' class='form-control' value='$t[nip]' name='nip'/><br>
        <label>User Name</label>
     <input type='text' class='form-control'  name='username'/><br>
 <label>Password</label>
     <input type='text' class='form-control'  name='password'/><br>
	 </div>
	 	<div class='col-md-3'>					
        <label>Tempat Lahir pegawai</label>
        <input type='text' class='form-control' value='$t[tmp_lahir]' name='tmp_lahir'/><br>
	<label>Tanggal Lahir pegawai</label>
        <input type='date' class='form-control' value='$t[tgl_lahir]' name='tgl_lahir'/><br>
	 </div>
	 <div class='col-md-3'>					
        <label>Jenis Kelamin</label>
		<select class='form-control select2' style='width: 100%;' name=jenis_kelamin>
		<option value=$t[jenis_kelamin] selected>$t[jenis_kelamin]</option>
	<option value='Laki-Laki'>Laki-Laki</option>
	<option value='Perempuan'>Perempuan</option>
	</select><br>
	<label>Nomor HP</label>
        <input type='text' class='form-control' value='$t[no_hp]' name='no_hp'/><br>
	 </div>
	  <div class='col-md-3'>					
        <label>Agama</label>
			<select class='form-control select2' style='width: 100%;' name=agama>
		<option value=$t[agama] selected>$t[agama]</option>
	<option value='Islam'>Islam</option>
			<option value='Kristen Protestan'>Kristen Protestan</option>
			<option value='Kristen Katholik'>Kristen Katholik</option>
			<option value='Hindu'>Hindu</option>
			<option value='Budha'>Budha</option>
	</select>
        <br>
	<label>Alamat Lengkap</label>
        <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
	 </div>
  
  </div> </div>
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <div class='tab-pane' id='settings'>
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form data
                                 </div>
                                
                                <div class='panel-body'>
									<div class='col-md-3'>					
        <label>Tingkat Pendidikan</label>
		<select class='form-control select2' style='width: 100%;' name=tingkat>
		<option value=$t[tingkat] selected>$t[tingkat]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM pendidikan ORDER BY id_pen");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_pen]>$c[jenjang]</option>";
		}
	echo "</select>
        <br>
	<label>Jurusan Pendidikan</label>
		<select class='form-control select2' style='width: 100%;' name=jurusan>
		<option value=$t[jurusan] selected>$t[jurusan]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM profesi ORDER BY id_profesi");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_profesi]>$c[nama_profesi]</option>";
		}
	echo "</select>
        <br>
	 </div>
	 	<div class='col-md-3'>					
        <label>Tahun Lulus</label>
        <input type='text' class='form-control' value='$t[tahun_lulus]' name='tahun_lulus'/><br>
	  <label>Lulus CPNS Tahun</label>
        <input type='date' class='form-control' value='$t[cpns]' name='cpns'/><br>
	 </div>
	  	<div class='col-md-3'>					
        <label>Tahun Pengakatan PNS</label>
        <input type='date' class='form-control' value='$t[pns]' name='pns'/><br>
	  <label>Golongan PNS</label>
       <select class='form-control select2' style='width: 100%;' name=gol>
		<option value=$t[gol] selected>$t[gol]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM golongan ORDER BY id_gol");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_gol]>$c[nama_gol]</option>";
		}
	echo "</select><br>
	 </div>
			<div class='col-md-3'>					
        <label>TMT Golongan</label>
        <input type='date' class='form-control' value='$t[tmp]' name='tmp'/><br>
	  <label>Eselon</label>
        <input type='text' class='form-control' value='$t[eselon]' name='eselon'/><br>
	 </div>						</div>
								</div>
								</div> <!-- /.tab-pane -->

              <div class='tab-pane' id='cpns'>
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form data
                                 </div>
                                
                                <div class='panel-body'>

  	<div class='col-md-3'>					
        <label>Taggal Jabatan</label>
        <input type='date' class='form-control' value='$t[tmt_jabatan]' name='tmt_jabatan'/><br>
	  <label>Jabatan</label>
       <select class='form-control select2' style='width: 100%;' name=jabatan>
		<option value=$t[jabatan] selected>$t[jabatan]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM jabatan ORDER BY id_jabatan");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_jabatan]>$c[nama_jabatan]</option>";
		}
	echo "</select><br>
	 </div>
	
     <div class='col-md-3'>					
     <label>Masa Kerja </label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Tahun</div>
     <input type='text' class='form-control' value='$t[masa_kerja_thn]' name='masa_kerja_thn' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div><br>
     <label>Masa Kerja </label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Bulan</div>
     <input type='text' class='form-control' value='$t[masa_kerja_bln]' name='masa_kerja_bln' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div><br>
  </div>
	 	 <div class='col-md-3'>					
        <label>email</label>
        <input type='text' class='form-control' value='$t[email]' name='email'/><br>
	<label>Status</label>
	<select class='form-control select2' style='width: 100%;' name=status>
		<option value=$t[status] selected>$t[status]</option>
		<option value='PNS'>PNS</option>
		<option value='P3K'>P3K</option>
        <option value='TKS'>TKS SK PUSKES</option>
        <option value='THLS'>THLS DINAS</option>
     </select><br><br>
     <label>Mempunyai Pesiunan (janda)</label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Rp</div>
     <input type='text' class='form-control' value='$t[pesiunan_janda]' name='pesiunan_janda' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div>
     <br>
	 </div>
     <div class='col-md-3'>
     <label>Total Gaji PNS (Rp)</label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Rp</div>
                  <input type='text' class='form-control' value='$t[gaji_pns]' name='gaji_pns' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/> 
                </div>					
    <br>
     <label>Pekerjaan Lainya</label>
     <input type='text' class='form-control' value='$t[pekerjaan_lain]' name='pekerjaan_lain'/><br>
     <label>Penghasilan Lain (Rp)</label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Rp</div>
     <input type='text' class='form-control' value='$t[penghasilan_lain]' name='penghasilan_lain' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div>
     <br>

  </div>
</div></div></div> <!-- /.tab-pane -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
		   	<div class='modal-footer'>
                                            <a href='index.php?aksi=pegawai' class='btn btn-default'>Close</a>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </form>
        </div> 
";
}

elseif($_GET['aksi']=='uploadfile'){
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>INFORMASI 
            </div>
            <div class='panel-body'>	
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama pegawai</th>
                                <th>NIP</th>		  
                          </tr></thead>
        <tbody>
        ";

$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE username=$_SESSION[username] ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                                <td>$t[nama_pegawai]</td>
                <td><div class='btn-group'>
                <a class='btn btn-info' href='index.php?aksi=listuploadfile&id_pegawai=$t[id_pegawai]' title='Edit'>$t[nip]</a>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='index.php?aksi=editpegawai&id_pegawai=$t[id_pegawai]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
           
            </ul>
        </div></td>
                            </tr>";
}
                      echo"  </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>		

";	
    }
elseif($_GET['aksi']=='listuploadfile'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>Berkas  $t[nama_pegawai]
            </div>
            <div class='panel-body'>
            <a class='btn btn-info' href='index.php?aksi=prosesupload&id_pegawai=$t[id_pegawai]' title='Edit'>Tambah File</a>	<br><br>
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Berkas</th>
                                <th>Download</th>		  
                          </tr></thead>
        <tbody>
        ";

$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM file WHERE  id_pegawai=$_GET[id_pegawai] ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                                <td>$t[nama_file]</td>
                <td><a class='btn btn-info' href='upload/$t[file_name]' title='dowload'><i class='fa  fa-download'></i></a>
                <a class='btn btn-danger' href='hapus.php?aksi=hapusberkas&file_id=$t[file_id]&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_file] ?')\" title='Hapus'><i class='fa  fa-remove '></i></a></td>
                            </tr>";
}
                      echo"  </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>		

";	
}
elseif($_GET['aksi']=='prosesupload'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>INFORMASI 
            </div>
            <div class='panel-body'>	
            <div class='form-grup'>
            <form id='upload_form' action='upload.php' method='post' enctype='multipart/form-data'>
            <div class='col-md-12'>					
            <label>Nama pegawai</label>
            <input type='text' class='form-control' value='$t[nama_pegawai]' name='nama_pegawai'/>
                    <input type='hidden' class='form-control' value='$t[id_pegawai]'  name='id_pegawai'/><br>
            <label>Nama File</label>
            <input type='text' class='form-control' name='nama_file'/><br>
           <label>File</label>
          <input  name='upload' id='upload' type='file' class='form-control'/>
          <br>
        <div id='progress-bar'></div>
        <br>
     <div id='targetLayer' style='display:none;'></div><br>
         </div>
    
        
            
            <div class='modal-footer'>
                                                <a class='btn btn-default' data-dismiss='modal'>Close</a>
                                                <button 'btnSubmit' class='btn btn-primary' class='form-control'>Upload</button>
                                            </div> </div>
                                            </form>                 
                </div>
            </div>
        </div>
    </div>		

";	    
    }
elseif($_GET['aksi']=='tunjangan'){
        echo"<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI TUNJANGAN
                </div>
                <div class='panel-body'>	
                       <div class='table-responsive'>		
    <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                <th>No</th>
                                    <th>Nama pegawai</th>
                                    <th>Tunjangan</th>
                                    <th>NIP</th>		  
                              </tr></thead>
            <tbody>
            ";
    
    $no=0;
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE username=$_SESSION[username]");
    while ($t=mysqli_fetch_array($tebaru)){	
    $no++;
                            echo"<tr>
                                <td>$no</td>
                                    <td>$t[nama_pegawai]</td>
                                    <td>"; if($t['status_pg']=='baru'){
                                           echo"<a class='btn btn-info' href='index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]'>Tambah keluarga</a>";
                                            }
                                          else if($t['status_pg']=='ada'){
                                            echo"<a class='btn btn-primary' href='input.php?aksi=inputtunjangan&id_pegawai=$t[id_pegawai]' >Ajukan Tunjangan</a>";
                                          } else { 
                                            echo"<a class='btn btn-primary' href='index.php?aksi=lihattunjangan' >Lihat Pengajuan</a>";
                                             }
                                       echo"
                                  </td>
                    <td><div class='btn-group'>
                    <a class='btn btn-info' href='index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]'>data keluarga</a>
              <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                <span class='caret'></span>
                <span class='sr-only'>Toggle Dropdown</span>
              </button>
              <ul class='dropdown-menu' role='menu'>
                <li><a href='index.php?aksi=editpegawai&id_pegawai=$t[id_pegawai]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
                </ul>
            </div></td>
                                </tr>";
    }
                          echo"  </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       </div>		
    
    ";	
 }
 elseif($_GET['aksi']=='listtunjangan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>Berkas  $t[nama_pegawai]
            </div>
            <div class='panel-body'>
            <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                               Data Istri/Suami
                            </button>  <button class='btn btn-info' data-toggle='modal' data-target='#uiModal1'>
                            Tambah Data Anak
                        </button>  <br><br>
          
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Keluarga</th>
                                <th>Status Keluarga</th>
                                <th></th>
                                <th></th>		  
                          </tr></thead>
        <tbody>
        ";
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM keluarga WHERE  id_pegawai=$_GET[id_pegawai] ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                            <td>$t[nama_keluarga]</td>
                <td>$t[status_keluarga]</td>
                <td>"; if($t['tunjang_status']=='pengajuan'){
                    echo"<a class='btn btn-primary' href='edit.php?aksi=tidakajukantunjangan&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin tidak mengajukan tunjangan Untuk  $t[status_keluarga] anda atas nama $t[nama_keluarga]  ?')\" >Di Ajukan</a>";
                     }
                   else if($t['tunjang_status']=='tidak'){
                     echo" <a class='btn btn-primary'href='edit.php?aksi=ajukantunjangan&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin mengajukan tunjangan Untuk  $t[status_keluarga] anda atas nama $t[nama_keluarga]  ?')\"  >Tidak Di Ajukan</a>";
                   } else { 
                     echo"<a class='btn btn-danger' href='edit.php?aksi=ajukantunjangan&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin mengajukan tunjangan Untuk  $t[status_keluarga] anda atas nama $t[nama_keluarga]  ?')\" >Anjukan Tunjangan</a>";
                      }
                echo"</td>
                <td><div class='btn-group'>
                <a class='btn btn-info' href='index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]'>Aksi</a>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>"; if($t['status_aktif']=='anak'){ echo"<li><a href='index.php?aksi=editkeluargaanak&id_keluarga=$t[id_keluarga]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>"; }
            else { echo"<li><a href='index.php?aksi=editkeluarga&id_keluarga=$t[id_keluarga]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>";  }
            echo" <li><a href='hapus.php?aksi=hapuskeluarga&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_keluarga] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
            </ul>
        </div>
                </td>
                            </tr>";
}
                      echo"  </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>		

";
echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                         <form role='form' method='post' action='input.php?aksi=inputkeluarga'>
                                            <div class='form-group'>
                         <label>Nama Suami/Istri</label>
                         <input type='hidden' class='form-control' value='$_GET[id_pegawai]' name='id_pegawai'/> 
                         <input type='hidden' class='form-control' value='istri' name='status_aktif'/>                   
						 <input type='text' class='form-control' name='nama_keluarga'/><br>
                         <label>Jenis Kelamin</label>
	                    <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
		                <option value='' selected>Pilih Jenis Kelamin</option>
		                <option value=Laki-Laki>Laki-Laki</option>
                        <option value=Perempuan>Perempuan</option>
                        </select><br>
                        <label>Tempat Lahir</label>
                        <input type='text' class='form-control' name='tempatlahir_keluarga'/>
                       </br>
                       <label>Tgl Lahir</label>
                       <input type='date' class='form-control' name='tgllahir_keluarga'/>
                      </br>
                         <label>Status</label>
	                    <select class='form-control select2' style='width: 100%;' name=status_keluarga>
		                <option value='' selected>Pilih Status Keluarga</option>
		                <option value=istri>Istri</option>
                        <option value=suami>suami</option>
                        </select><br>
                        <label>Pekerjaan</label>
	                    <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
		                <option value='' selected>Pilih Pekerjaan</option>
		                <option value=bekerja>bekerja</option>
                        <option value=tidakbekerja>tidak bekerja</option>
                        </select><br>
                        <label>Penghasilan (jika bekerja)</label>
						 <input type='text' class='form-control' name='penghasilan_keluarga'/>
					    </br>
                        <label>Keterangan Istri/Suami</label>
                        <input type='text' class='form-control' name='ket_keluarga'/>
                       </br>
                       <label>Status Tunjangan</label>
                       <select class='form-control select2' style='width: 100%;' name=tunjang_status>
                       <option value='' selected>Pilih Tunjangan</option>
                       <option value=pengajuan>ajukan Tunjangan</option>
                       <option value=tidak>tidak di ajukan</option>
                       </select><br
  
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 	
echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data Anak</h4>
                                        </div>
                                        <div class='modal-body'>
                         <form role='form' method='post' action='input.php?aksi=inputkeluarga'>
                                            <div class='form-group'>
                         <label>Nama Anak</label>
                         <input type='hidden' class='form-control' value='$_GET[id_pegawai]' name='id_pegawai'/>
                         <input type='hidden' class='form-control' value='anak' name='status_aktif'/>                    
						 <input type='text' class='form-control' name='nama_keluarga'/><br>
                         <label>Jenis Kelamin</label>
	                    <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
		                <option value='-' selected>Pilih Jenis Kelamin</option>
		                <option value=Laki-Laki>Laki-Laki</option>
                        <option value=Perempuan>Perempuan</option>
                        </select><br><br>
                        <label>Tempat Lahir</label>
                        <input type='text' class='form-control' name='tempatlahir_keluarga'/>
                       </br>
                       <label>Tgl Lahir</label>
                       <input type='date' class='form-control' name='tgllahir_keluarga'/>
                      </br>
                      <label>Tanggal Meninggal/cerai Ayah/Ibu</label>
                      <input type='date' class='form-control' name='tgl_mati'/>
                     </br>
                      <label>Status Perkawinan Anak</label>
                      <select class='form-control select2' style='width: 100%;' name=status_nikah>
                      <option value='-' selected>Pilih Perkawinan Anak</option>
                      <option value=pernah>pernah nikah</option>
                      <option value=belum>belum nikah</option>
                      </select><br><br>
                      <label>Status Beasiswa</label>
                      <select class='form-control select2' style='width: 100%;' name=status_beasiswa>
                      <option value='-' selected>Pilih Beasiswa</option>
                      <option value=TidakAdaBeasiswa>Tidak Ada Beasiswa</option>
                      <option value=Beasiswa/Darmasiswa>Beasiswa/Darma siswa</option>
                      <option value=Ikatandinas>Ikatan dinas</option>
                      </select><br><br>
                         <label>Status Anak</label>
	                    <select class='form-control select2' style='width: 100%;' name=status_keluarga>
		                <option value='-' selected>Pilih Status Anak</option>
		                <option value=anak>anak</option>
                        <option value=anakangkat>anak angkat</option>
                        <option value=anaktiri>anak tiri</option>
                        </select><br><br>

                        <label>Status Pendidikan Anak</label>
	                    <select class='form-control select2' style='width: 100%;' name=status_sekolah>
		                <option value='-' selected>Pilih Pendidikan Anak</option>		    
                        <option value=BelumSekolah>Belum Sekolah</option>
		                <option value=sekolah>sekolah</option>
                        <option value=kuliah>kuliah</option>
                        </select><br><br>
                        <label>Status Pekerjaan Anak</label>
	                    <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
		                <option value='-' selected>Pilih Pekerjaan</option>
		                <option value=bekerja>bekerja</option>
                        <option value=tidakbekerja>tidak bekerja</option>
                        </select><br>
                        <label>Status Tunjangan</label>
                        <select class='form-control select2' style='width: 100%;' name=tunjang_status>
                        <option value='baru' selected>Pilih Tunjangan</option>
                        <option value=pengajuan>ajukan Tunjangan</option>
                        <option value=tidak>tidak di ajukan</option>
                        </select><br><br>
						  <label>Tempat Sekolah (jika masih sekolah)</label>
						 <input type='text' class='form-control' name='pendidikan_keluarga'/>
					    </br>
                        <label>Status Anak Angkat</label>
	                    <select class='form-control select2' style='width: 100%;' name=anak_angkat_status>
		                <option value='' selected>Pilih Status Anak Angkat</option>		    
                        <option value=negeri>Putusan Pengadilan Negeri</option>
		                <option value=tionghoa>Hukum adopsi bagi keturunan tionghoa</option>
                        </select><br><br>
                        <label>Keterangan Anak</label>
                        <input type='text' class='form-control' name='ket_keluarga'/>
                       </br>
  
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 	
}
elseif($_GET['aksi']=='editkeluarga'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM keluarga WHERE id_keluarga=$_GET[id_keluarga] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[nama_keluarga]
                            </div>
                            <div class='panel-body'>			
                             <form role='form' method='post' action='edit.php?aksi=proseseditkeluarga&id_keluarga=$t[id_keluarga]'>
                                                <div class='form-group'>
                             <label>Nama Keluarga</label>
                             <input type='hidden' class='form-control' value='$t[id_pegawai]' name='id_pegawai'/>    
                             <input type='hidden' class='form-control' value='$t[status_aktif]' name='status_aktif'/>                
                             <input type='text' class='form-control' value='$t[nama_keluarga]' name='nama_keluarga'/><br>
                             <label>Jenis Kelamin</label>
                            <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
                            <option value='$t[jk_keluarga]' selected>$t[jk_keluarga]</option>
                            <option value=Laki-Laki>Laki-Laki</option>
                            <option value=Perempuan>Perempuan</option>
                            </select><br>
                            <label>Tempat Lahir</label>
                            <input type='text' class='form-control' value='$t[tempatlahir_keluarga]' name='tempatlahir_keluarga'/>
                           </br>
                           <label>Tgl Lahir</label>
                           <input type='date' class='form-control' value='$t[tgllahir_keluarga]' name='tgllahir_keluarga'/>
                          </br>
                             <label>Status</label>
                            <select class='form-control select2' style='width: 100%;' name=status_keluarga>
                            <option value='$t[status_keluarga]' selected>$t[status_keluarga]</option>
                            <option value=istri>Istri</option>
                            <option value=suami>suami</option>
                            <option value=anak>anak</option>
                            <option value=anak angkat>anak angkat</option>
                            </select><br>
                            <label>Status Tunjangan</label>
                            <select class='form-control select2' style='width: 100%;' name=tunjang_status>
                            <option value='$t[tunjang_status]' selected>$t[tunjang_status]</option>
                            <option value=pengajuan>ajukan Tunjangan</option>
                            <option value=tidak>tidak di ajukan</option>
                            </select><br><br>
                            <label>Pekerjaan</label>
                            <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
                            <option value='$t[pekejaan_keluarga]' selected>$t[pekejaan_keluarga]</option>
                            <option value=bekerja>bekerja</option>
                            <option value=tidak bekerja>tidak bekerja</option>
        
                            </select><br>
                         
                            <label>Penghasilan (jika bekerja)</label>
                             <input type='text' class='form-control' value='$t[penghasilan_keluarga]' name='penghasilan_keluarga'/>
                            </br>
                            <label>Keterangan Istri/Suami</label>
                            <input type='text' class='form-control' value='$t[ket_keluarga]' name='ket_keluarga'/>
                           </br>
      
                                                <button type='button' class='btn btn-default' onclick=self.history.back()>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                        </div>
                        </div>
                </div>
        </div>	
    "; 	
}
elseif($_GET['aksi']=='editkeluargaanak'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM keluarga WHERE id_keluarga=$_GET[id_keluarga] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>ANAK $t[nama_keluarga]
                            </div>
                            <div class='panel-body'>			
                            <form role='form' method='post' action='edit.php?aksi=prosesedianak&id_keluarga=$t[id_keluarga]'>
                            <div class='form-group'>
         <label>Nama Anak</label>
         <input type='hidden' class='form-control' value='$t[id_pegawai]' name='id_pegawai'/>
         <input type='hidden' class='form-control' value='anak' name='status_aktif'/>                    
         <input type='text' class='form-control' value='$t[nama_keluarga]' name='nama_keluarga'/><br>
         <label>Jenis Kelamin</label>
        <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
        <option value='$t[jk_keluarga]' selected>$t[jk_keluarga]</option>
        <option value=Laki-Laki>Laki-Laki</option>
        <option value=Perempuan>Perempuan</option>
        </select><br><br>
        <label>Tempat Lahir</label>
        <input type='text' class='form-control'  value='$t[tempatlahir_keluarga]' name='tempatlahir_keluarga'/>
       </br>
       <label>Tgl Lahir</label>
       <input type='date' class='form-control' value='$t[tgllahir_keluarga]' name='tgllahir_keluarga'/>
      </br>
      <label>Tanggal Meninggal/cerai Ayah/Ibu</label>
      <input type='date' class='form-control' value='$t[tgl_mati]' name='tgl_mati'/>
     </br>
      <label>Status Perkawinan Anak</label>
      <select class='form-control select2' style='width: 100%;' name=status_nikah>
      <option value='$t[status_nikah]' selected>$t[status_nikah]</option>
      <option value=pernah>pernah nikah</option>
      <option value=belum>belum nikah</option>
      </select><br><br>
      <label>Status Beasiswa</label>
      <select class='form-control select2' style='width: 100%;' name=status_beasiswa>
      <option value='$t[status_beasiswa]' selected>$t[status_beasiswa]</option>
      <option value=TidakAdaBeasiswa>Tidak Ada Beasiswa</option>
      <option value=Beasiswa/Darmasiswa>Beasiswa/Darma siswa</option>
      <option value=Ikatandinas>Ikatan dinas</option>
      </select><br><br>
         <label>Status Anak</label>
        <select class='form-control select2' style='width: 100%;' name=status_keluarga>
        <option value='$t[status_keluarga]' selected>$t[status_keluarga]</option>
        <option value=anak>anak</option>
        <option value=anakangkat>anak angkat</option>
        <option value=anaktiri>anak tiri</option>
        </select><br><br>

        <label>Status Pendidikan Anak</label>
        <select class='form-control select2' style='width: 100%;' name=status_sekolah>
        <option value='$t[status_sekolah]' selected>$t[status_sekolah]</option>		    
        <option value=BelumSekolah>Belum Sekolah</option>
        <option value=sekolah>sekolah</option>
        <option value=kuliah>kuliah</option>
        </select><br><br>
        <label>Status Pekerjaan Anak</label>
        <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
        <option value='$t[pekejaan_keluarga]' selected>$t[pekejaan_keluarga]</option>
        <option value=bekerja>bekerja</option>
        <option value=tidakbekerja>tidak bekerja</option>
        </select><br>
        <label>Status Tunjangan</label>
        <select class='form-control select2' style='width: 100%;' name=tunjang_status>
        <option value='$t[tunjang_status]' selected>$t[tunjang_status]</option>
        <option value=pengajuan>ajukan Tunjangan</option>
        <option value=tidak>tidak di ajukan</option>
        </select><br><br>
          <label>Tempat Sekolah (jika masih sekolah)</label>
         <input type='text' value='$t[pendidikan_keluarga]' class='form-control' name='pendidikan_keluarga'/>
        </br>
        <label>Status Anak Angkat</label>
        <select class='form-control select2' style='width: 100%;' name=anak_angkat_status>
        <option value='$t[anak_angkat_status]' selected>$t[anak_angkat_status]</option>		    
        <option value=negeri>Putusan Pengadilan Negeri</option>
        <option value=tionghoa>Hukum adopsi bagi keturunan tionghoa</option>
        </select><br><br>
        <label>Keterangan Anak</label>
        <input type='text' class='form-control' value='$t[ket_keluarga]' name='ket_keluarga'/>
       </br>

                            <button type='button' class='btn btn-default' onclick=self.history.back()>Close</button>
                            <button type='submit' class='btn btn-primary'>Save </button>
                        </div>
    </form>
                        </div>
                        </div>
                </div>
        </div>	
    "; 	
}
elseif($_GET['aksi']=='postunjangan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>$t[nama_pegawai]
                            </div>
                            <div class='panel-body'>			
            <form role='form' method='post' action='input.php?aksi=inputtunjangan'>
                            <div class='form-group'>
         <label>Pekerjaan Sampingan</label>
         <input type='hidden' class='form-control' value='$t[id_pegawai]' name='id_pegawai'/>                   
         <input type='text' class='form-control'  name='t_pekerjaan'/><br>
         <label>Penghasilan Sampingan Rp</label>                
         <input type='text' class='form-control'  name='t_penghasilan'/><br>
         <label>Mempunyai pensiunan janda Rp</label>
         <input type='text' class='form-control'  name='t_janda'/><br>
         <label>Gaji PNS Rp</label>
         <input type='text' class='form-control'  name='t_gaji'/><br>
         <button type='button' class='btn btn-default'' onclick=self.history.back()>Close</button>
                            <button type='submit' class='btn btn-primary'>Save </button>
                        </div>
          </form>
                             
                        </div>
                        </div>
                </div>
        </div>	
    "; 	
}
elseif($_GET['aksi']=='lihattunjangan'){
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
            </div>
            <div class='panel-body'>
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Status Tunjangan</th>
                                <th></th>
                             	  
                          </tr></thead>
        <tbody>
        ";
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM tunjangan,pegawai WHERE tunjangan.id_pegawai=pegawai.id_pegawai AND pegawai.username=$_SESSION[username]");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                            <td>$t[nama_pegawai]</td>
                <td>$t[t_status]</td>
                <td><a class='btn btn-primary' href='cetaksk.php?id_pegawai=$t[id_pegawai]' target='_blank'>Cetak SK</a> 
                <a class='btn btn-primary' href='cetakskanak.php?id_pegawai=$t[id_pegawai]' target='_blank'>Cetak Daftar Anak</a></td>
               
                            </tr>";
}
                      echo"  </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>		
";
}
?>