<nav class="navbar navbar-expand-md border-bottom">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/logo.png') ?>" alt="Logo" class="d-inline-block align-text-top me-2">
            <span class="fw-bold">SIMS PPOB</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= (current_url(true)->getSegment(1) == 'top-up') ? 'text-danger' : ''; ?>" aria-current="page" href="<?= base_url('/top-up') ?>">Top Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (current_url(true)->getSegment(1) == 'transaction') ? 'text-danger' : ''; ?>" href="<?= base_url('/transaction') ?>">Transaction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (current_url(true)->getSegment(1) == 'profile') ? 'text-danger' : ''; ?>" href="<?= base_url('/profile') ?>">Akun</a>
                </li>
            </ul>
        </div>
    </div>
</nav>