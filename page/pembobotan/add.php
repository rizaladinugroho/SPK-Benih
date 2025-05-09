<?php
require("../controller/Bobot.php");

$alternatif = Index("SELECT * FROM alternatif");
$kriteria = Index("SELECT * FROM kriteria");

if (isset($_POST["add"])) {
    if (Add("pembobotan", $_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil masuk kedalam database',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data gagal masuk kedalam database',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php?halaman=databobot';
        });
        </script>";
    }
}
?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Form Tambah Pembobotan</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-link" href="index.php?halaman=databobot">
                                    <ion-icon name="arrow-back-circle" class="mr-2"></ion-icon>Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <form action="" method="post">
                                <div class="field">
                                    <label class="label">Data Alternatif</label>
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select id="alternatifDropdown" name="id_alternatif">
                                                <option value="" selected disabled>Pilih Alternatif</option>
                                                <?php foreach ($alternatif as $row) : ?>
                                                    <option value="<?= htmlspecialchars($row["id_alternatif"]) ?>">
                                                        <?= htmlspecialchars($row["nm_alternatif"]) ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="icon is-small is-left">
                                            <ion-icon name="chevron-down"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Data Kriteria</label>
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select id="kriteriaDropdown" name="id_kriteria">
                                                <option value="" selected disabled>Pilih Kriteria</option>
                                                <?php foreach ($kriteria as $row) : ?>
                                                    <option value="<?= htmlspecialchars($row["id_kriteria"]) ?>">
                                                        <?= htmlspecialchars($row["nm_kriteria"]) ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="icon is-small is-left">
                                            <ion-icon name="chevron-down"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nilai</label>
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select id="nilaiDropdown" name="nilai">
                                                <option value="" selected disabled>Pilih Nilai</option>
                                                <option value="1">1 (Sangat tidak penting)</option>
                                                <option value="2">2 (Tidak penting)</option>
                                                <option value="3">3 (Cukup penting)</option>
                                                <option value="4">4 (Penting)</option>
                                                <option value="5">5 (Sangat penting)</option>
                                                </select>
                                        </div>
                                        <div class="icon is-small is-left">
                                            <ion-icon name="chevron-down"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button id="submitButton" class="button is-link" type="submit" name="add" disabled>
                                        <ion-icon name="save" class="mr-2"></ion-icon>Simpan
                                    </button>
                                    <button class="button is-link" type="reset">
                                        <ion-icon name="refresh-circle" class="mr-2"></ion-icon>Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var alternatifDropdown = document.getElementById('alternatifDropdown');
        var kriteriaDropdown = document.getElementById('kriteriaDropdown');
        var nilaiDropdown = document.getElementById('nilaiDropdown');
        var submitButton = document.getElementById('submitButton');

        function toggleSubmitButton() {
            // Enable submit button if both dropdowns have selected values
            if (alternatifDropdown.value && kriteriaDropdown.value && nilaiDropdown.value) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        // Event listeners for dropdown changes
        alternatifDropdown.addEventListener('change', toggleSubmitButton);
        kriteriaDropdown.addEventListener('change', toggleSubmitButton);
        nilaiDropdown.addEventListener('change', toggleSubmitButton);

        // Initial call to set button state based on current dropdown values
        toggleSubmitButton();
    });
</script>
