<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert"><?= validation_errors();?></div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" id="tambahKategori"><i class="fas fafile-alt"></i> Tambah Kategori</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1; foreach ($kategori as $k) { ?>
                            <tr>
                                <th scope="row"><?= $a++; ?></th>
                                <td><?= $k['nama_kategori']; ?></td>
                                <td>
                                    <a href="#" data-id-kategori="<?= $k['id_kategori']; ?>" data-nama-kategori='<?= $k['nama_kategori']; ?>' class="badge badge-info tombol-ubah"><i class="fas fa-edit"></i> Ubah</a>
                                    <a href="<?= base_url('buku/hapusKategori/').$k['id_kategori'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $k['nama_kategori'];?>?');" class="badge badge-danger">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="kategoriBaruModal" tabindex="-1" role="dialog" aria-labelledby="kategoriBaruModalLabel" ariahidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriBaruModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" datadismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku/kategori'); ?>" method="post" id="form-kategori">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="nama_kategori" class="form-control form-control-user">
                        <!-- <select name="kategori" class="form-control form-control-user">
                            <option value="">Pilih Kategori</option>
                            </?php
                                $k = ['Sains','Hobby','Komputer','Komunikasi','Hukum','Agama','Populer',' Bahasa','Komik'];
                                for ($i=0;$i<9;$i++) {
                            ?>
                                <option value="</?= $k[$i];?>"></?= $k[$i];?></option>
                            </?php } ?>
                        </select> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> <span id="tombol-simpan">Tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->
<script>
    $('.tombol-ubah').click(function (e) {
        e.preventDefault()
        let namaKategori = $(this).data('namaKategori')
        let idKategori = $(this).data('idKategori')
        let modal = $('#kategoriBaruModal')
        let inputNamaKategori = $('[name="nama_kategori"]')
        modal.modal('show')
        $('[name="id_kategori"]').remove()
        $('#form-kategori').append('<input type="hidden" name="id_kategori" value="'+idKategori+'">')
        inputNamaKategori.val(namaKategori)        
        $('#tombol-simpan').html('Simpan')
    })
    $('#tambahKategori').click(function (e) {
        e.preventDefault()
        $('[name="id_kategori"]').remove()
        $('#tombol-simpan').html('Tambah')
        $('[name="nama_kategori"]').val('')
        $('#kategoriBaruModal').modal('show')
    })
</script>