<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('.passwordShowHide a').on('click', function() {
            const passwordField = $(this).closest('.passwordShowHide').find('input');
            const fieldType = passwordField.attr('type');

            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $(this).find('i').removeClass('bi-eye').addClass('bi-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                $(this).find('i').removeClass('bi-eye-slash').addClass('bi-eye');
            }
        });

        balanceShow();

        function balanceShow() {
            var saldoElement = $('#saldo');
            if (localStorage.getItem("balanceShow") == "show") {
                saldoElement.removeClass('hide-balance');
                saldoElement.text("<?= isset($balance) ? number_format(esc($balance), 0, '', '.') : '' ?>");
                $('#toggleSaldo').html('<i class="bi bi-eye-slash ms-1"></i>');
            } else {
                saldoElement.addClass('hide-balance');
                saldoElement.html('&bull;&bull;&bull;&bull;&bull;&bull;&bull;');
                $('#toggleSaldo').html('<i class="bi bi-eye ms-1"></i>');
            }
        }

        $('#toggleSaldo').on('click', function() {
            var saldoElement = $('#saldo');

            if (saldoElement.hasClass('hide-balance')) {
                localStorage.setItem("balanceShow", "show");
                saldoElement.removeClass('hide-balance');
                saldoElement.text("<?= isset($balance) ? number_format(esc($balance), 0, '', '.') : '' ?>");
                $(this).html('<i class="bi bi-eye-slash ms-1"></i>');
            } else {
                localStorage.setItem("balanceShow", "hide");
                saldoElement.addClass('hide-balance');
                saldoElement.html('&bull;&bull;&bull;&bull;&bull;&bull;&bull;');
                $(this).html('<i class="bi bi-eye ms-1"></i>');
            }
        });
        $('#topUp input').on('input', function() {
            var nominal = $('#topUp input').val();

            if (nominal.trim() !== '') {
                $('#topUp button[type=submit]').prop('disabled', false);
            } else {
                $('#topUp button[type=submit]').prop('disabled', true);
            }
        });

        const swiper = new Swiper('.swiper', {
            slidesPerView: 2,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        let offset = 1;
        $('#showMore').click(function() {
            offset++
            getTransactionHistory(1, offset)
        })

        function getTransactionHistory(limit, offset) {
            $.ajax({
                url: "<?= base_url('/transaction/get-history') ?>",
                type: 'get',
                data: {
                    limit: limit,
                    offset: offset
                },
                success: res => {
                    for (let i = 0; i < res.length; i++) {
                        $('#addTransaction').append(`
                            <div class="card mb-3">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <div id="nominal" class="${res[i].transaction_type == 'PAYMENT' ? 'text-danger' : 'text-success'} fw-bold fs-5">+ Rp${res[i].total_amount}</div>
                                        <div id="date" class="text-body-secondary form-text">
                                            ${res[i].created_on}
                                        </div>
                                    </div>
                                    <div>
                                        ${res[i].description}
                                    </div>
                                </div>
                            </div>
                        `)
                    }
                },
                error: err => {}
            })
        }

        // Fungsi untuk memeriksa apakah gambar tersedia
        function checkImage(url, callback) {
            var img = new Image();
            img.onload = function() {
                callback(true);
            };
            img.onerror = function() {
                callback(false);
            };
            img.src = url;
        }

        // Memeriksa apakah gambar tersedia
        checkImage('<?= isset($profile->profile_image) ? esc($profile->profile_image) : "" ?>', function(exists) {
            if (!exists) {
                // Jika gambar tidak ditemukan, ubah src menjadi path gambar default
                document.getElementById('image').src = '<?= base_url('assets/profile_photo.png') ?>';
            }
        });
    });
</script>

</body>

</html>