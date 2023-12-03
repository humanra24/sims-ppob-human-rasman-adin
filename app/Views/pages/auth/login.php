<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row align-items-center min-vh-100">
        <div class="col-md-6 p-5">
            <div id="title" class="mb-4">
                <div id="logo" class="d-flex align-items-center justify-content-center mb-4">
                    <img src="<?= base_url('assets/logo.png') ?>" alt="logo" class="img-fluid me-2">
                    <span class="fw-bold">SIMS PPOB</span>
                </div>
                <h4 id="title" class="text-center fw-bold">
                    Masuk atau buat akun <br> untuk memulai
                </h4>
            </div>

            <form action="<?= base_url('/login') ?>" method="post" class="mb-4">
                <?= csrf_field() ?>
                <?php if (isset($errors['failed'])) { ?>
                    <div class="alert alert-danger">
                        <?= $errors['failed'] ?>
                    </div>
                <?php } ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent">@</span>
                        <input type="email" class="form-control border-start-0" name="email" placeholder="masukan email anda" value="<?= esc($old_data['email'] ?? '') ?>" autofocus>
                    </div>
                    <div class='form-text text-danger text-end'><?= $errors['email'] ?? '' ?></div>
                </div>
                <div class="mb-4">
                    <div class="input-group passwordShowHide">
                        <span class="input-group-text bg-transparent"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control border-start-0 border-end-0" name="password" placeholder="masukan password anda">
                        <span class="input-group-text bg-transparent">
                            <a href="javascript:;" class="text-decoration-none text-black"><i class="bi bi-eye"></i></a>
                        </span>
                    </div>
                    <div class='form-text text-danger text-end'><?= $errors['password'] ?? '' ?></div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-danger">Masuk</button>
                </div>
            </form>

            <div id="linkRegistrasi" class="text-center form-text">
                belum punya akun? registrasi <a href="<?= base_url('/register') ?>" class="text-danger text-decoration-none">di sini</a>
            </div>

        </div>
        <div class="col-md-6">
            <img src="<?= base_url('assets/illustrasi_login.png') ?>" alt="gambar" class="img-fluid">
        </div>
    </div>
</div>

<?= $this->endSection(); ?>