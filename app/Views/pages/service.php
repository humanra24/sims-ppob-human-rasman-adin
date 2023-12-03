<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<?= view('layouts/navbar') ?>

<div class="container mb-5">
    <?= view('components/balance') ?>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="form-text mb-2">Pembayaran</div>
            <div class="fw-bold fs-5 d-flex align-items-center">
                <img src="<?= $service['service_icon'] ?>" alt="<?= $service['service_name'] ?>" width="30" class="img-fluid me-2">
                <span class="fw-bold"><?= $service['service_name'] ?></span>
            </div>
        </div>
        <div class="col">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-transparent"><i class="bi bi-cash"></i></span>
                    <input type="text" name="nominal" id="nominal" value="<?= number_format(esc($service['service_tariff']), 0, '', '.') ?>" class="form-control border-start-0" readonly>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-danger">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>