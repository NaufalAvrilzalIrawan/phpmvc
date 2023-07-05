<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#TambahModal">
                Tambah Barang
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/barang/cari" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari..." name="keyword" id="keyword" autocomplete="off">
                <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
            </form>
        </div>
    </div>

    <div class="row">
        <h3>Daftar Barang</h3>
        <ul class="list-group">
            <?php foreach( $data['barangs'] as $barang) :?>

                <li class="list-group-item">
                    <?= $barang['Nama_Barang'] ?>
                    <a href="<?= BASEURL; ?>/barang/hapus/<?= $barang['ID']?>" class="badge bg-danger float-end ms-1" onclick="return confirm('Tru kah?')">hapus</a>
                    <a href="<?= BASEURL; ?>/barang/ubah/<?= $barang['ID']?>" class="badge bg-success float-end ms-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#TambahModal" data-id="<?= $barang['ID'];?>">Ubah</a>
                    <a href="<?= BASEURL; ?>/barang/detail/<?= $barang['ID']?>" class="badge bg-primary float-end ms-1">detail</a>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="TambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLabel">Tambah Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/barang/tambah" method="post">
            <input type="hidden" name="id" id="id"></input>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Barang">
            </div>
            <div class="mb-3">
                <label for="kate" class="form-label">Kategori Barang</label>
                <select class="form-select" aria-label="Default select example" id="kate" name="kate">
                    <option selected>Pilih Kategori</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="ART">Alat Rumah Tangga</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>  
            <div class="mb-3">
                <label for="harg" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="harg" name="harg" placeholder="Masukkan harga Barang">
            </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>