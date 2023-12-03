<div class="row mt-4 align-items-center mb-4">
    <div class="col-md-2">
        <img src="<?= esc($profile->profile_image) ?>" id="image" alt="" class="img-fluid mb-2">
        <div class="form-text">Selamat datang,</div>
        <div class="fw-bold fs-5 text-nowrap"><?= "$profile->first_name $profile->last_name" ?></div>
    </div>
    <div class="col offset-md-3 offset-lg-4">
        <div class="d-flex flex-column justify-content-center" style="background: url('<?= base_url('assets/background_saldo.png') ?>'); background-size: contain; background-repeat: no-repeat; height: 150px;">
            <div class="text-white ms-4 mb-3">
                <div class="mb-2">Saldo anda</div>
                <div class="fw-bold fs-4 mb-2">Rp <span id="saldo" class="hide-balance">&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span></div>
                <div>Lihat Saldo <a href="javascript:;" id="toggleSaldo" class="text-decoration-none text-white"><i class="bi bi-eye ms-1"></i></a></div>
            </div>
        </div>
    </div>
</div>