<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <div class="page-header">
                    <span class="fas fa-users text-primary mt-2 "> Data User</span>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Anggota</th>
                            <th>Email</th>
                            <th>Role ID</th>
                            <th>Aktif</th>
                            <th>Member Sejak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($anggota as $a) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= $a['role_id']; ?></td>
                            <td><?= $a['is_active']; ?></td>
                            <td><?= date('Y', strtotime($a['tanggal_input'])); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>