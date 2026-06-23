<?php
class Connection {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "db_uas_pbo_trpl1b_bintangfajarjolyaanggara";
    private $db;
    
    public function getConnection(){
        if ($this->db == null){
            $this->db = new mysqli($this->host, $this->user, $this->password, $this->dbname);

            if ($this->db->connect_error){
                die("<p style='color: red; font-weight: bold;'>[Status] Koneksi gagal: " . $this->db->connect_error . "</p>");
            }
        }
        return $this->db;
    }

    public function getKoneksi(){
        return $this->getConnection();
    }
}
?>