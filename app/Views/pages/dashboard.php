<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<?= view('layouts/navbar') ?>

<div class="container mb-5">
    <?= view('components/balance') ?>

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

    <div class="row mb-4">
        <?php foreach ($services as $service) { ?>
            <a href="<?= base_url("service/" . strtolower($service['service_code'])) ?>" class="col-4 col-md-2 col-lg-1 d-flex flex-column align-items-center text-decoration-none mb-3">
                <img src="<?= $service['service_icon'] ?>" alt="item" class="img-fluid">
                <div class="text-center form-text"><?= $service['service_name'] ?></div>
            </a>
        <?php } ?>
    </div>
    <div id="banner">
        <div id="title" class="mb-3">Temukan promo menarik</div>
        <!-- Tempat di mana swiper akan ditampilkan -->
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach ($banners as $banner) { ?>
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="<?= $banner['banner_image'] ?>" alt="<?= $banner['banner_name'] ?>" class="img-fluid">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>