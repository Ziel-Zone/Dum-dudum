<?php
class karyawan {
    
    private $mysqli;
    
    function __construct($conn) {
        $this->mysqli = $conn;
    }
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $row[] = $row;
        }
    }
    public function tampil($id = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM karyawan ";
        if($id != null){
            $sql .= " WHERE id_cs = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    
    public function tambah($id_cs, $nama_cs, $jk_cs, $alamat_cs, $no_ktp) {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO karyawan VALUES ('$id_cs', '$nama_cs', '$jk_cs', '$alamat_cs', '$no_ktp')") or die ($db->error);
    }
    
    public function hapus($id_cs){
    	$db = $this->mysqli->conn;
    	$db->query("DELETE FROM karyawan WHERE id_cs = '$id_cs'") or die($db->error); 
    }
    
    function __destruct(){
    	$db = $this->mysqli->conn;
    	$db->close();
    }
    
    public function editdatakry($sql){
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }
    
    function cari($keyword) {
        $query = "SELECT * FROM karyawan
                    WHERE
                id_cs LIKE '%$keyword%'
                nama_cs LIKE '%$keyword%'
                jk_cs LIKE '%$keyword%'
                alamat_cs LIKE '%$keyword%'
                no_ktp LIKE '%$keyword%'
        ";
        return query($query);
    }
}
?>