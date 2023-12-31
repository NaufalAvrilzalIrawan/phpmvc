<?php

class Barang_model {

    private $table = 'barang';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllBarangs() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBarangById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE ID=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahDataBarang($data) {
        $query = "INSERT INTO barang VALUES ('', :nama, :kate, :harg)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kate', $data['kate']);
        $this->db->bind('harg', $data['harg']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataBarang($data) {
        $query = "UPDATE barang SET Nama_Barang = :nama,
                    Kat_Barang = :kate,
                    Harga_Barang = :harg
                    WHERE ID = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kate', $data['kate']);
        $this->db->bind('harg', $data['harg']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function hapusDataBarang($id) {
        $query = "DELETE FROM barang WHERE ID=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataBarang() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM barang WHERE Nama_Barang LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}

// .
// - Komik : Nauo | Masi Khimo, ShoJumpun (Rp. 35000) - 132 Halaman.
// - Game :  | ,  () ~  Jam.
// - Komik : Keju Gulung | Naufal, Keju Gulung Corp. (Rp. 5000) - 0 Halaman.
// - Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000)