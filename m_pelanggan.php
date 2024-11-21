<?php
class Pelanggan {
    
    private $mysqli;
    
    function __construct($conn) {
        $this->mysqli = $conn;
    }
    
    public function tampil($nik = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM pelanggan";
        if($nik != null) {
            $sql = " WHERE nik = $nik";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    
    public function tambah($nik, $plat_nomor, $nama_pelanggan, $jk_pelanggan, $alamat_pelanggan, $telp_pelanggan, $lama_sewa, $waktu_sewa, $waktu_kembali) {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO pelanggan VALUES ('$nik', '$plat_nomor', '$nama_pelanggan', '$jk_pelanggan', '$alamat_pelanggan', '$telp_pelanggan', '$lama_sewa', '$waktu_sewa', '$waktu_kembali')") or die ($db->error);
    }
    
    public function hapus($nik){
    	$db = $this->mysqli->conn;
    	$db->query("DELETE FROM pelanggan WHERE nik = '$nik'") or die($db->error); 
    }
    
    function __destruct(){
    	$db = $this->mysqli->conn;
    	$db->close();
    }
    
    public function editdataplg($sql){
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }
    function cari($keyword) {
        $query = "SELECT * FROM karyawan
                    WHERE
                nik LIKE '%$keyword%'
                plat_nomor LIKE '%$keyword%'
                nama_pelanggan LIKE '%$keyword%'
                jk_pelanggan LIKE '%$keyword%'
                alamat_pelanggan LIKE '%$keyword%'
                telp_pelanggan LIKE '%$keyword%'
                lama_sewa LIKE '%$keyword%'
                waktu_sewa LIKE '%$keyword%'
                waktu_kembali LIKE '%$keyword%'
        ";
        return query($query);
    }
}
?>