<?php
if (isset($_GET['halaman'])) {
    $halaman = $_GET['halaman'];

    switch ($halaman) {
        case 'home':
            include "home/index.php";
            break;
        case 'dataalternatif':
            include "alternatif/views.php";
            break;
        case 'tambahdataalternatif':
            include "alternatif/add.php";
            break;
        case 'editdataalternatif':
            include "alternatif/edit.php";
            break;
        case 'hapusdataalternatif':
            include "alternatif/delete.php";
            break;
        case 'datakriteria':
            include "kriteria/views.php";
            break;
        case 'tambahdatakriteria':
            include "kriteria/add.php";
            break;
        case 'editdatakriteria':
            include "kriteria/edit.php";
            break;
        case 'hapusdatakriteria':
            include "kriteria/delete.php";
            break;
        case 'databobot':
            include "pembobotan/views.php";
            break;
        case 'tambahdatabobot':
            include "pembobotan/add.php";
            break;
        case 'editdatabobot':
            include "pembobotan/edit.php";
            break;
        case 'hapusdatabobot':
            include "pembobotan/delete.php";
            break;
        case 'datapenilaian':
            include "nilai/views.php";
            break;
            // case 'editmhs':
            //     include "content/edit/editmhs.php";
            //     break;
            // case 'hapusmhs':
            //     include "content/hapus/hapusmhs.php";
            //     break;
            // case 'hapusmk':
            //     include "content/hapus/hapusmk.php";
            //     break;
            // default:
            //     include "source/error.php";
            //     break;
    }
} else {
    include "home/index.php";
}
