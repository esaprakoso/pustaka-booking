<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <a href="" class="btn btn-primary mb-3" id="tombolTambah"><i class="fas fa-filealt"></i> Buku Baru</a>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php if(validation_errors()){?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors();?>
                        </div>
                    <?php }?>
                    <?= $this->session->flashdata('pesan'); ?>
                    <table class="table table-hover" id="table-datatable">
                        <thead class="bg-info text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Stok</th>
                                <th scope="col">DiPinjam</th>
                                <th scope="col">DiBooking</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $a = 1; foreach ($buku as $b) { ?>
                            <tr>
                                <th scope="row"><?= $a++; ?></th>
                                <td><?= $b['judul_buku']; ?></td>
                                <td><?= $b['pengarang']; ?></td>
                                <td><?= $b['penerbit']; ?></td>
                                <td><?= $b['tahun_terbit']; ?></td>
                                <td><?= $b['isbn']; ?></td>
                                <td><?= $b['stok']; ?></td>
                                <td><?= $b['dipinjam']; ?></td>
                                <td><?= $b['dibooking']; ?></td>
                                <td>
                                    <picture>
                                        <source srcset="" type="image/svg+xml">
                                        <img src="<?= base_url('assets/img/upload/') . $b['image'];?>" class="img-fluid img-thumbnail" alt="...">
                                    </picture>
                                </td>
                                <td>
                                    <a href="#" class="badge badge-info ubahBuku" data-id-buku="<?= $b['id'] ?>">
                                        <i class="fas fa-edit"></i> Ubah
                                    </a>
                                    <a href="<?= base_url('buku/hapusbuku/').$b['id'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$b['judul_buku'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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
<!-- End of Main Content -->
<!-- Modal Tambah buku baru-->
<div class="modal fade" id="bukuBaruModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" ariahidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Buku</h5>
                <button type="button" class="close" datadismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku'); ?>" method="post" enctype="multipart/form-data" id="form-buku">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku">
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" id="id_kategori" class="form-control form-control-user">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id_kategori'];?>"><?= $k['nama_kategori'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit">
                    </div>
                    <div class="form-group">
                        <select name="tahun" id="tahun" class="form-control form-control-user">
                            <option value="">Pilih Tahun</option>
                            <?php for ($i=date('Y'); $i >= 1900 ; $i--) { ?>
                                <option value="<?= $i;?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok">
                    </div>
                    <div class="form-group">
                        <img src="" id="gambar-preview" style="width:60%">
                        <input type="file" class="form-control form-control-user" id="image" name="image" onchange="preview_image(event)">
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    function preview_image(event) 
    {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('gambar-preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    $('#tombolTambah').click(function (e){
        e.preventDefault()
        let bukuBaruModal = $('#bukuBaruModal')
        let gambarPreview = $('#gambar-preview')
        let input_judul_buku    = $('#judul_buku')
        let input_id_kategori   = $('#id_kategori')
        let input_pengarang     = $('#pengarang')
        let input_penerbit      = $('#penerbit')
        let input_tahun         = $('#tahun')
        let input_isbn          = $('#isbn')
        let input_stok          = $('#stok')
        bukuBaruModal.modal('show')

        input_judul_buku.val('')
        input_id_kategori.val('')
        input_pengarang.val('')
        input_penerbit.val('')
        input_tahun.val('')
        input_isbn.val('')
        input_stok.val('')
        gambarPreview.attr('src','')
        $('[name="id_buku"]').remove()
    })
    $('.ubahBuku').click(function (e) {
        e.preventDefault()
        let btn = $(this)
        let formBuku = $('#form-buku')
        btn.addClass('disabled')
        btn.html('<i>Loading ...</i>')
        let idBuku = btn.data('idBuku')
        let bukuBaruModal = $('#bukuBaruModal')
        let gambarPreview = $('#gambar-preview')
        let pathImage = 'assets/img/upload/'

        let input_judul_buku    = $('#judul_buku')
        let input_id_kategori   = $('#id_kategori')
        let input_pengarang     = $('#pengarang')
        let input_penerbit      = $('#penerbit')
        let input_tahun         = $('#tahun')
        let input_isbn          = $('#isbn')
        let input_stok          = $('#stok')
        
        $.get("<?= site_url('buku/getDetailBuku') ?>/"+idBuku,function (r) {
            input_judul_buku.val(r.judul_buku)
            input_id_kategori.val(r.id_kategori)
            input_pengarang.val(r.pengarang)
            input_penerbit.val(r.penerbit)
            input_tahun.val(r.tahun_terbit)
            input_isbn.val(r.isbn)
            input_stok.val(r.stok)
            btn.removeClass('disabled')
            btn.html('<i class="fas fa-edit"></i> Ubah')
            bukuBaruModal.modal('show')
            gambarPreview.attr('src',pathImage+r.image)
            $('[name="id_buku"]').remove()
            formBuku.append('<input type="hidden" name="id_buku" value="'+r.id+'">')
        })
    })
</script>