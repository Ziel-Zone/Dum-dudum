<?php
include "models/m_karyawan.php";

$kry = new karyawan($connection);

if( isset($_POST["cari"])) {
        $kry = cari($_POST["keyword"]);
} else if(@$_GET['act'] == ''){
?>


<div class="row">
          <div class="col-lg-12">
            <h1> Menu Rental <small> Daftar Karyawan </small></h1>
            <ol class="breadcrumb">
              <li><a href=""><i class="icon-dashboard"></i> Menu Rental </a></li>
                <li class="active"><i class="fa fa-bar-chart-o"></i> Daftar Karyawan </li>
            </ol>
          </div>
        </div>
        <div align="center" class="">
            <td align="center">Menampilkan Daftar Karyawan</td></div><br>
<form action="" method="post" class="success">
    
    <input type="text" name="keyword" size="40" autofocus placeholder="Cari data .." autocomplete="off">
    <button class="btn btn-success btn-xs" type="submit" nama="cari" size="14"> Cari! </button>
    
</form><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-respondsive">
                    <table class="table table-bordered table-hover table-striped">
                        <tr class="info">
                            <th>ID Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No. KTP</th>
							<th>Opsi</th>  
                        </tr>
                        <?php
                        $tampil = $kry->tampil();
                        while($data = $tampil-> fetch_object()){
                            ?>
                        <tr>
                            <td><?php echo $data->id_cs; ?></td>
                            <td><?php echo $data->nama_cs; ?></td>
                            <td><?php echo $data->jk_cs; ?></td>
                            <td><?php echo $data->alamat_cs; ?></td>
                            <td><?php echo $data->no_ktp; ?></td>
                            <td align="center">
                                <a id="edit_karyawan" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_cs; ?>" data-nk="<?php echo $data->nama_cs; ?>" data-jk="<?php echo $data->jk_cs; ?>" data-ak="<?php echo $data->alamat_cs; ?>" data-nk="<?php echo $data->no_ktp; ?> "><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href ="?page=daftar_karyawan&act=del&id=<?php echo $data->id_cs; ?>" onclick="return confirm('Anda yakin akan menghapusnya?')">
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</button>
								</a>
							</td>
                            </tr>
                        <?php
                        }   ?>
                    </table>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Data</button>
                <div id="tambah" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Data Karyawan</h4>
                                    </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label" for="id_cs">ID Karyawan</label>
                                            <input type="text" name="id_cs" class="form-control" id="id_cs" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="nama_cs">Nama Karyawan</label>
                                            <input type="text" name="nama_cs" class="form-control" id="nama_cs" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="jk_cs">Jenis Kelamin</label>
											<select class="form-control" name="jk_cs" id=jk_cs>
											<option>Laki-Laki</option>
											<option>Perempuan</option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="alamat_cs">Alamat</label>
                                            <input type="text" name="alamat_cs" class="form-control" id="alamat_cs" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="no_ktp">No. KTP</label>
                                            <input type="number" name="no_ktp" class="form-control" id="no_ktp" autocomplete="off" required>
                                        </div>                
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                                    </div>
                                </form>
                            <?php
                            if(@$_POST['tambah']){
                                $id_cs = $connection->conn->real_escape_string($_POST['id_cs']);
                                $nama_cs = $connection->conn->real_escape_string($_POST['nama_cs']);
                                $jk_cs = $connection->conn->real_escape_string($_POST['jk_cs']);
                                $alamat_cs = $connection->conn->real_escape_string($_POST['alamat_cs']);
                                $no_ktp = $connection->conn->real_escape_string($_POST['no_ktp']);
                                
                                $kry->tambah($id_cs, $nama_cs, $jk_cs, $alamat_cs, $no_ktp);
                                header('location: ?page=daftar_karyawan'); 
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <a href="">
        <button type="button" class="btn btn-warning" onClick="window.print();"><i class="fa fa-print"></i> Cetak Data </button>
        </a> 

        <div id="edit" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Karyawan</h4>
                    </div>
                    <form id="form" enctype="multipart/form-data">
                    <div class="modal-body" id="modal-edits">
                                        <div class="form-group">
                                            <label class="control-label" for="id_cs">ID Karyawan Yang Akan diubah</label>
                                            <input type="hidden" name="id_cs" class="form-control" id="id_cs" required>
                                            <input type="text" name="id_cs" class="form-control" id="id_cs" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="nama_cs">Nama Karyawan</label>
                                            <input type="text" name="nama_cs" class="form-control" id="nama_cs" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="jk_cs">Jenis Kelamin</label>
											<select class="form-control" name="jk_cs" id=jk_cs>
											<option>Laki-Laki</option>
											<option>Perempuan</option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="alamat_cs">Alamat</label>
                                            <input type="text" name="alamat_cs" class="form-control" id="alamat_cs" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="no_ktp">No. KTP</label>
                                            <input type="number" name="no_ktp" class="form-control" id="no_ktp" autocomplete="off" required>
                                        </div>
                                    </div>
                        <div class="modal-footer">
                        <input type="submit" class="btn btn-success" name="edit" value="Simpan">
						</div> 
                    </form>
                </div>
            </div> 
        <script src="assets/js/jquery-1.10.2.js"></script>
        <script type="text/javascript">
        $(document).on("click", "#edit_karyawan", function(){
            var idcs = $(this).data('id');
            var namacs = $(this).data('nama_cs');
            var jkcs = $(this).data('jk_cs');
            var alamatcs = $(this).data('alamat_cs');
            var ktpcs = $(this).data('no_ktp');
			$("#modal-edits #id_cs").val(idcs);
            $("#modal-edits #nama_cs").val(namacs);
            $("#modal-edits #jk_cs").val(jkcs);
            $("#modal-edits #alamat_cs").val(alamatcs);
            $("#modal-edits #ktp_cs").val(ktpcs); 
        })
        
        $(document).ready(function(e){
            $("#form").on("submit", (function(e){
                e.preventDefault();
                $.ajax({
                    url : 'models/proses_edit_karyawan.php',
                    type : 'POST',
                    data : new FormData(this),
                    contentType : false,
                    cache : false,
                    processData : false,
                    success : function(msg) {
                        $('.table').html(msg);
                    }
                });
            }));
        })
        </script>
<?php
} else if (@$_GET['act'] == 'del'){
    echo "proses delete untuk id_cs: " .$_GET['id_cs'];
    $kry->hapus(@$_GET['id']);
    header("location: ?page=daftar_karyawan");
}
?>