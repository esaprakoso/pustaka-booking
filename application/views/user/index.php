<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <div class="card mb-3 p-5" style="max-width: 600px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') .$user['image']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            Nama
                        </div>
                        <div class="col-lg-7">
                            <b><?= $user['nama']; ?></b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            Email
                        </div>
                        <div class="col-lg-7">
                            <b><?= $user['email']; ?></b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            Member sejak
                        </div>
                        <div class="col-lg-7">
                            <b><?= date('d F Y',strtotime($user['tanggal_input'])); ?></b>
                        </div>
                    </div>
                </div>
                <div class="btn btn-info ml-3 my-3">
                    <a href="<?= base_url('user/ubahprofil'); ?>" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
