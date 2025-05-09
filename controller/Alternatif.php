<?php
function Koneksi()
{
    return mysqli_connect("localhost", "root", "", "benih");
}

function Index($query)
{
    $koneksi = Koneksi();
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function Add($table, $data)
{
    $koneksi = Koneksi();
    $kode = htmlspecialchars($data["kode_alternatif"]);
    $alternatif = htmlspecialchars($data["nm_alternatif"]);
    $query = "INSERT INTO $table VALUES (null, '$kode', '$alternatif')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Edit($table, $data)
{
    $koneksi = Koneksi();
    $id_alternatif = htmlspecialchars($data["id_alternatif"]);
    $kode = htmlspecialchars($data["kode_alternatif"]);
    $alternatif = htmlspecialchars($data["nm_alternatif"]);
    $query = "UPDATE $table SET kode_alternatif = '$kode', nm_alternatif = '$alternatif' WHERE id_alternatif = $id_alternatif";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Delete($table, $tableid, $id)
{
    $koneksi = Koneksi();
    $query = "DELETE FROM $table WHERE $tableid = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
