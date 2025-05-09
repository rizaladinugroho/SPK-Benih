<?php
require("../controller/Alternatif.php");

if (isset($_POST["add"])) {
    if (Add("alternatif", $_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil masuk kedalam database',
        })
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data gagal masuk kedalam database',
        }).then(function() {
            window.location.href = 'index.php?halaman=dataalternatif';
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
                            <p class="card-header-title">Form Tambah Data</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-link" href="index.php?halaman=dataalternatif">
                                    <ion-icon name="arrow-back-circle" class="mr-2"></ion-icon>Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <form action="" method="post">
                                <div class="field">
                                    <label class="label">Kode Alternatif</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Kode Alternatif, Contoh : A1" name="kode_alternatif" required 
                                        oninvalid="this.setCustomValidity('mohon diisi kode alternatifnya')" oninput="setCustomValidity('')">
                                        <span class="icon is-small is-left">
                                            <ion-icon name="qr-code"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama Alternatif</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Nama alternatif" name="nm_alternatif" required>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="home"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button class="button is-link" type="submit" name="add">
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