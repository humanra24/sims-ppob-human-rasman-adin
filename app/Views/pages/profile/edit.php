<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<?= view('layouts/navbar') ?>

<div class="container mb-5 mt-3">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center flex-column align-items-center mb-4">
            <img src="<?= esc($profile->profile_image) ?>" id="image" width="120" alt="profile" class="img-fluid mb-2">
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalEditProfile">
                Ubah Foto Profil
            </a>
            <div class="fw-bold"><?= esc($profile->first_name) . ' ' . esc($profile->last_name) ?></div>
        </div>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger col-8">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success col-8">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <form class="col-8" action="<?= base_url('/profile/edit') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" disabled value="<?= esc($profile->email) ?>">
            </div>
            <div class="mb-3">
                <label for="namaDepan" class="form-label">Nama Depan</label>
                <input type="text" class="form-control" id="namaDepan" name="nama_depan" value="<?= esc($profile->first_name) ?>">
            </div>
            <div class="mb-3">
                <label for="namaBelakang" class="form-label">Nama Belakang</label>
                <input type="text" class="form-control" id="namaBelakang" name="nama_belakang" value="<?= esc($profile->last_name) ?>">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-danger mb-3">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEditProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Foto Profil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('/edit-image-profile') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <input class="form-control" type="file" id="formFile" name="gambar" accept=".png, .jpeg">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>