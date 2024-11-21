<?php
include "models/m_pelanggan.php";

$plg = new Pelanggan($connection);

if(@$_GET['act'] == ''){
?>

<div class="row">
          <div class="col-lg-12">
            <h1> Menu Rental <small> Daftar Pelanggan </small></h1>
            <ol class="breadcrumb">
              <li><a href=""><i class="icon-dashboard"></i> Menu Rental </a></li>
                <li class="active"><i class="fa fa-bar-chart-o"></i> Daftar Pelanggan </li>
            </ol>
          </div>
        </div>
<div align="center" class="">
    <td align="center">Menampilkan Daftar Pelanggan</td></div>
        <br>
        <form action="" method="post" class="success">
    
    <input type="text" name="keyword" size="40" autofocus placeholder="Cari data .." autocomplete="off">
    <button class="btn btn-success btn-xs" type="submit" nama="cari" size="14"> Cari! </button>
    
</form><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-respondsive">
                    <table class="table table-bordered table-hover table-striped">
                        <tr class="info">
							<th>NIK</th>
                            <th>Plat Nomor</th>
                            <th>Nama Penyewa</th>
                            <th>Jenis Kelamin</th>
							<th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Lama Sewa</th>
                            <th>Waktu Sewa</th>
                            <th>Waktu Kembali</th>
							<th>Opsi</th>
                        </tr>
                        <?php
                        $tampil = $plg->tampil();
                        while($data = $tampil->fetch_object()){
                            ?>
                        <tr>
                            <td><?php echo $data->nik; ?></td>
                            <td><?php echo $data->plat_nomor; ?></td>
                            <td><?php echo $data->nama_pelanggan; ?></td>
                            <td><?php echo $data->jk_pelanggan; ?></td>
                            <td><?php echo $data->alamat_pelanggan; ?></td>
                            <td><?php echo $data->telp_pelanggan; ?></td>
                            <td><?php echo $data->lama_sewa; ?></td>
							<td><?php echo $data->waktu_sewa; ?></td>
                            <td><?php echo $data->waktu_kembali; ?></td>
                            <td align="center">
                                <a id="edit_pelanggan" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->nik; ?>" data-pn="<?php echo $data->plat_nomor; ?>" data-np="<?php echo $data->nama_pelanggan; ?>" data-jp="<?php echo $data->jk_pelanggan; ?>" data-ap="<?php echo $data->alamat_pelanggan; ?> " data-tp="<?php echo $data->telp_pelanggan; ?>" data-ls="<?php echo $data->lama_sewa; ?>"data-ws="<?php echo $data->waktu_sewa; ?>"data-wk="<?php echo $data->waktu_kembali; ?> "><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href ="?page=daftar_pelanggan&act=del&id=<?php echo $data->nik; ?>" onclick="return confirm('Anda yakin akan menghapusnya?')">
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
                                    <h4 class="modal-title">Tambah Data Penyewa</h4>
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label" for="nik">Masukan NIK</label>
                                            <input type="text" name="nik" class="form-control" id="nik" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="plat_nomor">Plat Nomor</label>
                                            <input type="option" name="plat_nomor" class="form-control" id="plat_nomor" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="nama_pelanggan">Masukan Nama</label>
                                            <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="jk_pelanggan">Jenis Kelamin</label>
                                            <input type="gender" name="jk_pelanggan" class="form-control" id="jk_pelanggan" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="alamat_pelanggan">Alamat</label>
                                            <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="telp_pelanggan">Nomor Telp</label>
                                            <input type="text" name="telp_pelanggan" class="form-control" id="telp_pelanggan" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="lama_sewa">Lama Sewa (Hari)</label>
                                            <input type="number" name="lama_sewa" class="form-control" id="lama_sewa" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="waktu_sewa">Waktu Sewa</label>
                                            <input type="date" name="waktu_sewa" class="form-control" id="waktu_sewa" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="waktu_kembali">Waktu Kembali</label>
                                            <input type="date" name="waktu_kembali" class="form-control" id="waktu_kembali" autocomplete="off" required>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Hapus</button>
                                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                                    </div>
                                    </div>
                            </form>
         <?php
             if(@$_POST['tambah']){
                 $nik            = $connection->conn->real_escape_string($_POST['nik']);
                 $plat_nomor     = $connection->conn->real_escape_string($_POST['plat_nomor']);
                 $nama_pelanggan = $connection->conn->real_escape_string($_POST['nama_pelanggan']);
                 $jk_pelanggan   = $connection->conn->real_escape_string($_POST['jk_pelanggan']);
                 $alamat_pelanggan = $connection->conn->real_escape_string($_POST['alamat_pelanggan']);
                 $telp_pelanggan   = $connection->conn->real_escape_string($_POST['telp_pelanggan']);
                 $lama_sewa        = $connection->conn->real_escape_string($_POST['lama_sewa']);
                 $waktu_sewa       = $connection->conn->real_escape_string($_POST['waktu_sewa']);
                 $waktu_kembali    = $connection->conn->real_escape_string($_POST['waktu_kembali']); 
                                
                 $plg->tambah($nik, $plat_nomor, $nama_pelanggan, $jk_pelanggan, $alamat_pelanggan, $telp_pelanggan, $lama_sewa, $waktu_sewa, $waktu_kembali);
                 header('location: ?page=daftar_pelanggan');
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
                        <h4 class="modal-title">Edit Data Pelanggan</h4>
                    </div>
                    <form id="form" enctype="multipart/form-data">
                    <div class="modal-body" id="modal-edits">
                                        <div class="form-group">
                                            <label class="control-label" for="nik">NIK Yang Akan Diubah</label>
                                            <input type="hidden" name="nik" id="nik" required>
                                            <input type="text" name="nik" class="form-control" id="nik" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="plat_nomor">Plat Nomor</label>
                                            <input type="option" name="plat_nomor" class="form-control" id="plat_nomor" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="nama_pelanggan">Masukan Nama</label>
                                            <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="jk_pelanggan">Jenis Kelamin</label>
                                            <input type="gender" name="jk_pelanggan" class="form-control" id="jk_pelanggan" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="alamat_pelanggan">Alamat</label>
                                            <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="telp_pelanggan">Nomor Telp</label>
                                            <input type="text" name="telp_pelanggan" class="form-control" id="telp_pelanggan" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="lama_sewa">Lama Sewa (Hari)</label>
                                            <input type="number" name="lama_sewa" class="form-control" id="lama_sewa" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="waktu_sewa">Waktu Sewa</label>
                                            <input type="date" name="waktu_sewa" class="form-control" id="waktu_sewa" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="waktu_kembali">Waktu Kembali</label>
                                            <input type="date" name="waktu_kembali" class="form-control" id="waktu_kembali" autocomplete="off" required>
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
        $(document).on("click", "#edit_pelanggan", function(){
            var nik = $(this).data('id');
            var platnomor = $(this).data('plat_nomor');
            var namaplg = $(this).data('nama_pelanggan');
            var jkplg = $(this).data('jk_pelanggan');
            var alamatplg = $(this).data('alamat_pelanggan');
			var tlpplg = $(this).data('telp_pelanggan');
            var lamasewa = $(this).data('lama_sewa');
            var waktusewa = $(this).data('waktu_sewa');
            var waktukembali = $(this).data('waktu_kembali');
			$("#modal-edits #nik").val(nik);
            $("#modal-edits #plat_nomor").val(platnomor);
            $("#modal-edits #nama_pelanggan").val(namaplg);
            $("#modal-edits #jk_pelanggan").val(jkplg);
            $("#modal-edits #alamat_pelanggan").val(alamatplg);
            $("#modal-edits #telp_pelanggan").val(tlpplg);
            $("#modal-edits #lama_sewa").val(lamasewa);
            $("#modal-edits #waktu_sewa").val(waktusewa);
            $("#modal-edits #waktu_kembali").val(waktukembali);
        })
        
        $(document).ready(function(e){
            $("#form").on("submit", (function(e){
                e.preventDefault();
                $.ajax({
                    url : 'models/proses_edit_pelanggan.php',
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
    echo "proses delete untuk nik: " .$_GET['nik'];
    $plg->hapus(@$_GET['id']);
    header("location: ?page=daftar_pelanggan");
}
?>