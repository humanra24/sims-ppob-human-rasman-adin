<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<?= view('layouts/navbar') ?>

<div class="container mb-5">
    <?= view('components/balance') ?>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="fw-bold">Semua Transaksi</div>
        </div>
        <div class="col">
            <?php foreach ($transactions as $transaction) { ?>
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <div id="nominal" class="<?= esc($transaction->transaction_type) == 'PAYMENT' ? 'text-danger' : 'text-success' ?> fw-bold fs-5">+ Rp.<?= number_format(esc(esc($transaction->total_amount), 0, '', '.')) ?></div>
                            <div id="date" class="text-body-secondary form-text">
                                <?php
                                $tgl = strtotime(esc($transaction->created_on));
                                echo date('d-m-Y', $tgl);
                                ?>
                            </div>
                        </div>
                        <div id="description">
                            <?= esc($transaction->description) ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div id="addTransaction"></div>

            <?php if (count($transactions)) { ?>
                <div class="text-center">
                    <a href="javascript:;" class="text-danger fw-bold text-decoration-none" id="showMore">Show more</a>
                </div>
            <?php } else { ?>
                <div class="text-center fw-bold">Tidak ada transaksi</div>
            <?php } ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>