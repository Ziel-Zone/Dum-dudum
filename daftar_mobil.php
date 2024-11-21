<?php
include "models/m_mobil.php";

$mbl = new Mobil($connection);

if(@$_GET['act'] == ''){
?>

<div class="row">
          <div class="col-lg-12">
            <h1> Menu Rental <small> Daftar Mobil </small></h1>
            <ol class="breadcrumb">
              <li><a href=""><i class="icon-dashboard"></i> Menu Rental </a></li>
                <li class="active"><i class="fa fa-bar-chart-o"></i> Daftar Mobil </li>
            </ol>
          </div>
        </div>
<div align="center" color="info">
    <td align="center">Menampilkan Daftar Mobil</td></div><br>
    <form action="" method="post" class="success">
    
    <input type="text" name="keyword" size="40" autofocus placeholder="Cari data .." autocomplete="off">
    <button class="btn btn-success btn-xs" type="submit" nama="cari" size="14"> Cari! </button>
    
</form><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-respondsive">
                    <table class="table table-bordered table-hover table-striped">
                        <tr class="info">
                            <th>Plat Nomor</th>
                            <th>Merk Mobil</th>
                            <th>Type Mobil</th>
                            <th>Tahun Buat</th>
                            <th>Kapasitas</th>
                            <th>Stok Mobil</th>
                            <th>Biaya Rental</th>
                            <th>Opsi</th>
                        </tr>
                        <?php
                        $tampil = $mbl->tampil();
                        while($data = $tampil->fetch_object()){
                            ?>
                        <tr>
                            <td><?php echo $data->plat_nomor; ?></td>
                            <td><?php echo $data->merk_mobil; ?></td>
                            <td><?php echo $data->tipe_mobil; ?></td>
                            <td><?php echo $data->thn_buat; ?></td>
                            <td><?php echo $data->kapasitas; ?></td>
                            <td><?php echo $data->stok_mobil; ?></td>
                            <td><?php echo $data->biaya_rental; ?></td>
                            <td align="center">
								<a id="edit_mobil" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->plat_nomor; ?>" data-mb="<?php echo $data->merk_mobil; ?>" data-tm="<?php echo $data->tipe_mobil; ?>" data-tb="<?php echo $data->thn_buat; ?>" data-kp="<?php echo $data->kapasitas; ?> " data-sm="<?php echo $data->stok_mobil; ?>" data-br="<?php echo $data->biaya_rental; ?> "><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href ="?page=daftar_mobil&act=del&id=<?php echo $data->plat_nomor; ?>" onclick="return confirm('Anda yakin akan menghapusnya?')">
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
                                    <h4 class="modal-title">Tambah Data Mobil</h4>
                                    </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label" for="plat_nomor">Plat Nomor</label>
                                            <input type="text" name="plat_nomor" class="form-control" id="plat_nomor" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="merk_mobil">Merk Mobil</label>
                                            <input type="text" name="merk_mobil" class="form-control" id="merk_mobil" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="tipe_mobil">Type Mobil</label>
                                            <input type="text" name="tipe_mobil" class="form-control" id="tipe_mobil" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="thn_buat">Tahun di Buat</label>
                                            <input type="number" name="thn_buat" class="form-control" id="thn_buat" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="kapasitas">Kapasitas</label>
                                            <input type="number" name="kapasitas" class="form-control" id="kapasitas" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="stok_mobil">Stok Mobil</label>
                                            <input type="number" name="stok mobil" class="form-control" id="stok_mobil" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="biaya_rental">Biaya Rental</label>
                                            <input type="number" name="biaya_rental" class="form-control" id="biaya_rental" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Hapus</button>
                                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                                    </div>
                                </form>
                            
                            <?php
                            if(@$_POST['tambah']){
                                $plat_nomor = $connection->conn->real_escape_string($_POST['plat_nomor']);
                                $merk_mobil = $connection->conn->real_escape_string($_POST['merk_mobil']);
                                $tipe_mobil = $connection->conn->real_escape_string($_POST['tipe_mobil']);
                                $thn_buat = $connection->conn->real_escape_string($_POST['thn_buat']);
                                $kapasitas = $connection->conn->real_escape_string($_POST['kapasitas']);
                                $stok_mobil = $connection->conn->real_escape_string($_POST['stok_mobil']);
                                $biaya_rental = $connection->conn->real_escape_string($_POST['biaya_rental']);
                                
                                $mbl->tambah($plat_nomor, $merk_mobil, $tipe_mobil, $thn_buat, $kapasitas, $stok_mobil, $biaya_rental);
                                header('location: ?page=daftar_mobil'); 
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
                        <h4 class="modal-title">Edit Data Mobil</h4>
                    </div>
                    <form id="form" enctype="multipart/form-data">
                        <div class="modal-body" id="modal-edits">
                                        <div class="form-group">
                                            <label class="control-label" for="plat_nomor">Plat Nomor Mobil Yang Akan Diubah</label>
                                            <input type="text" name="plat_nomor" class="form-control" id="plat_nomor" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="merk_mobil">Merk Mobil</label>
                                            <input type="text" name="merk_mobil" class="form-control" id="merk_mobil" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="tipe_mobil">Type Mobil</label>
                                            <input type="text" name="tipe_mobil" class="form-control" id="tipe_mobil" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="thn_buat">Tahun di Buat</label>
                                            <input type="number" name="thn_buat" class="form-control" id="thn_buat" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="kapasitas">Kapasitas</label>
                                            <input type="number" name="kapasitas" class="form-control" id="kapasitas" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="stok_mobil">Stok Mobil</label>
                                            <input type="number" name="stok mobil" class="form-control" id="stok_mobil" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="biaya_rental">Biaya Rental</label>
                                            <input type="number" name="biaya_rental" class="form-control" id="biaya_rental" autocomplete="off" required>
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
        $(document).on("click", "#edit_mobil", function(){
            var platnomor = $(this).data('id');
            var merkmobil = $(this).data('merk_mobil');
            var tipemobil = $(this).data('tipe_mobil');
            var thnbuat = $(this).data('thn_buat');
            var kpsts = $(this).data('kapasitas');
			var stokmobil = $(this).data('stok_mobil');
            var biayarental = $(this).data('biaya_rental');
			$("#modal-edits #plat_nomor").val(platnomor);
            $("#modal-edits #merk_mobil").val(merkmobil);
            $("#modal-edits #tipe_mobil").val(tipemobil);
            $("#modal-edits #thn_buat").val(thnbuat);
            $("#modal-edits #kapasitas").val(kpsts);
            $("#modal-edits #stok_mobil").val(stokmobil);
            $("#modal-edits #biaya_rental").val(biayarental);  
        })
        
        $(document).ready(function(e){
            $("#form").on("submit", (function(e){
                e.preventDefault();
                $.ajax({
                    url : 'models/proses_edit_mobil.php',
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
    echo "proses delete untuk plat_nomor: " .$_GET['plat_nomor'];
    $mbl->hapus(@$_GET['id']);
    header("location: ?page=daftar_mobil");
}
?>