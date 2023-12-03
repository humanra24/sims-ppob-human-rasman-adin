<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<?= view('layouts/navbar') ?>

<div class="container mb-5">
    <?= view('components/balance') ?>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="form-text">Silahkan masukan</div>
            <div class="fw-bold fs-5">Nominal Top Up</div>
        </div>
        <div class="col-md-8">
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
            <form action="" method="post" id="topUp">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="bi bi-cash"></i></span>
                        <input type="number" name="nominal" id="nominal" class="form-control border-start-0" value="<?= esc($old_data['nominal'] ?? '') ?>">
                    </div>
                    <div class='form-text text-danger text-end'><?= $errors['nominal'] ?? '' ?></div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-danger" disabled>Top Up</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-4">
                    <form class="card mb-2" action="" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="nominal" value="10000">
                        <button type="submit" class="btn">
                            <div class="card-body p-0 m-0 py-1 form-text text-center">
                                Rp10.000
                            </div>
                        </button>
                    </form>
                </div>
                <div class="col-4">
                    <form class="card mb-2" action="" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="nominal" value="20000">
                        <button type="submit" class="btn">
                            <div class="card-body p-0 m-0 py-1 form-text text-center">
                                Rp20.000
                            </div>
                        </button>
                    </form>
                </div>
                <div class="col-4">
                    <form class="card mb-2" action="" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="nominal" value="50000">
                        <button type="submit" class="btn">
                            <div class="card-body p-0 m-0 py-1 form-text text-center">
                                Rp50.000
                            </div>
                        </button>
                    </form>
                </div>
                <div class="col-4">
                    <form class="card mb-2" action="" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="nominal" value="100000">
                        <button type="submit" class="btn">
                            <div class="card-body p-0 m-0 py-1 form-text text-center">
                                Rp100.000
                            </div>
                        </button>
                    </form>
                </div>
                <div class="col-4">
                    <form class="card mb-2" action="" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="nominal" value="250000">
                        <button type="submit" class="btn">
                            <div class="card-body p-0 m-0 py-1 form-text text-center">
                                Rp250.000
                            </div>
                        </button>
                    </form>
                </div>
                <div class="col-4">
                    <form class="card mb-2" action="" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="nominal" value="500000">
                        <button type="submit" class="btn">
                            <div class="card-body p-0 m-0 py-1 form-text text-center">
                                Rp500.000
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>