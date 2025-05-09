<?php
require("../controller/Kriteria.php");

if (isset($_POST["add"])) {
    if (Add("kriteria", $_POST) > 0) {
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
        })
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
            window.location.href = 'index.php?halaman=datakriteria';
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
                            <p class="card-header-title">Form Tambah Kriteria</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-link" href="index.php?halaman=datakriteria">
                                    <ion-icon name="arrow-back-circle" class="mr-2"></ion-icon>Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <form action="" method="post">
                                <div class="field">
                                    <label class="label">Kode Kriteria</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Kode kriteria, misal C1" name="kode_kriteria" required 
                                        oninvalid="this.setCustomValidity('harap diisi')" oninput="setCustomValidity('')">
                                        <span class="icon is-small is-left">
                                            <ion-icon name="qr-code"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama Kriteria</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Nama kriteria" name="nm_kriteria" required>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="pricetag"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Bobot</label>
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select id="bobotDropdown" name="bobot">
                                                <option value="" selected disabled>Pilih Bobot</option>
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
                                <div class="field">
                                    <label class="label">Status</label>
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select id="statusDropdown" name="status">
                                                <option value="" selected disabled>Pilih Status</option>
                                                <option value="COST">COST</option>
                                                <option value="BENEFIT">BENEFIT</option>
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
        var bobotDropdown = document.getElementById('statusDropdown');
        var statusDropdown = document.getElementById('statusDropdown');
        var submitButton = document.getElementById('submitButton');

        // Function to enable/disable the submit button based on dropdown selection
        function toggleSubmitButton() {
            if (statusDropdown.value && bobotDropdown.value) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        // Event listener for dropdown change
        bobotDropdown.addEventListener('change', toggleSubmitButton);
        statusDropdown.addEventListener('change', toggleSubmitButton);

        // Initial call to set button state based on current dropdown value
        toggleSubmitButton();
    });
</script>
