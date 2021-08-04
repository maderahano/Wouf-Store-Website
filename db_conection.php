<?php
    $dbcon = oci_connect("rahano","rahano","localhost/xe");

    if(!$dbcon)
    {
        echo "Koneksi Gagal!";
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    else
        echo "Koneksi Sukses";
?>