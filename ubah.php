<?php
require "function.php";

// ambil data di URL
    $id = $_GET["id"];
// query data buku berdasarkan id
    $books = query( "SELECT * FROM book WHERE id = $id" )[0];

// cek apakah tombol sumit sudah ditekan atau belum
    if(isset($_POST["submitdata"])) {

        // cek apakah data berhasil di ubah atau tidak
        if( ubah ($_POST) > 0 ){
            echo"<script> 
                    alert ('data berhasil diubah!');
                    document.location.href = 'page.php';
                </script>";
        } else {
            echo"<script> 
                    alert ('data gagal diubah!');
                    document.location.href = 'page.php';
                </script>";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubag data</title>
</head>

<body>
    <h1>Ubah data Buku</h1>
    <a href="page.php" style="background-color: red; color:aliceblue;">Back</a>
    <form action="" method="post">
        <ul>
            <input type="hidden" name="id" value="<?= $books["id"] ?>">
            <li>
                <label for="nama">Nama Buku</label>
                <input type="text" name="nama" id="nama" required value="<?= $books["nama"] ?>">
            </li>
            <li>
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" required value="<?= $books["pengarang"] ?>">
            </li>
            <li>
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" required value="<?= $books["penerbit"] ?>">
            </li>
            <li>
                <label for="diterbitkan">Tanggal Terbit</label>
                <input type="text" name="diterbitkan" id="diterbitkan" required value="<?= $books["diterbitkan"] ?>">
            </li>
            <li>
                <label for="halaman">Jumlah Halaman</label>
                <input type="text" name="halaman" id="halaman" required value="<?= $books["halaman"] ?>">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" id="gambar" required value="<?= $books["gambar"] ?>">
            </li>
            <li>
                <button type="submit" name="submitdata" style="background-color: blue; color:aliceblue;" onclick="return confirm('Apakah yang di isikan sudah benar?')">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>

</html>