<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<?= view('layouts/navbar') ?>

<div class="container mb-5 mt-3">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center flex-column align-items-center mb-4">
            <img src="<?= esc($profile->profile_image) ?>" id="image" width="120" alt="profile" class="img-fluid mb-2">
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
        <div class="mb-3 col-8">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" disabled id="email" value="<?= esc($profile->email) ?>">
        </div>
        <div class="mb-3 col-8">
            <label for="namaDepan" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" disabled id="namaDepan" value="<?= esc($profile->first_name) ?>">
        </div>
        <div class="mb-3 col-8">
            <label for="namaBelakang" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" disabled id="namaBelakang" value="<?= esc($profile->last_name) ?>">
        </div>
        <div class="col-8 d-grid">
            <a href="<?= base_url('/profile/edit') ?>" class="btn btn-outline-danger mb-3">Edit Profile</a>
            <form class="d-grid" action="<?= base_url('/logout') ?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>