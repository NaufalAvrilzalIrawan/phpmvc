<?php

class Barang extends Controller {
    public function index(){
        $data['judul'] = __CLASS__;
        $data['maker'] = 'Iwadmin';
        $data['barangs'] = $this->model('Barang_model')->getAllBarangs();
        
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id){
        $data['judul'] = "Detail ";
        $data['maker'] = 'Iwadmin';
        $data['barangs'] = $this->model('Barang_model')->getBarangById($id);
        
        $this->view('templates/header', $data);
        $this->view('barang/detail', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah() {

        if( $this->model('Barang_model')->tambahDataBarang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
        else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }


    public function ubah() {

        if( $this->model('Barang_model')->ubahDataBarang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
        else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }


    public function hapus($id) {

        if( $this->model('Barang_model')->hapusDataBarang($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
        else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }


    public function getUbah() {

        echo json_encode($this->model('Barang_model')->getBarangById($_POST['id']));
    }


    public function cari() {

        $data['judul'] = __CLASS__;
        $data['maker'] = 'Iwadmin';
        $data['barangs'] = $this->model('Barang_model')->cariDataBarang();
        
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer', $data);
    }

}