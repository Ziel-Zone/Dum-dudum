<?php
class Mobil {
    
    private $mysqli;
    
    function __construct($conn) {
        $this->mysqli = $conn;
    }
    
    public function tampil($plat_nomor = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM mobil";
        if($plat_nomor != null) {
            $sql = " WHERE plat_nomor = $plat_nomor";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    
    public function tambah($plat_nomor, $merk_mobil, $tipe_mobil, $thn_buat, $kapasitas, $stok_mobil, $biaya_rental) {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO mobil VALUES ('$plat_nomor', '$merk_mobil', '$tipe_mobil', '$thn_buat', '$kapasitas', '$stok_mobil', '$biaya_rental')") or die ($db->error);
    }
    
    public function hapus($plat_nomor){
    	$db = $this->mysqli->conn;
    	$db->query("DELETE FROM mobil WHERE plat_nomor = '$plat_nomor'") or die($db->error); 
    }
    
    function __destruct(){
    	$db = $this->mysqli->conn;
    	$db->close();
    }
    
    public function editdatamobil($sql){
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }

    function cari($keyword) {
        $query = "SELECT * FROM karyawan
                    WHERE
                plat_nomor LIKE '%$keyword%'
                merk_mobil LIKE '%$keyword%'
                tipe_mobil LIKE '%$keyword%'
                thn_buat LIKE '%$keyword%'
                kapasitas LIKE '%$keyword%'
                stok_mobil LIKE '%$keyword%'
                biaya_rental LIKE '%$keyword%'
        ";
        return query($query);
    }
}
?>