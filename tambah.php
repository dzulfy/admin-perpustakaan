<?php
require "function.php";

// cek apakah tombol sumit sudah ditekan atau belum
    if(isset($_POST["submitdata"])) {

        if( tambah ($_POST) > 0 ){
            echo"<script> 
                    alert ('data berhasil ditambahkan!');
                    document.location.href = 'page.php';
                </script>";
        } else {
            echo"<script> 
                    alert ('data gagal ditambahkan!');
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
    <title>Insert Data</title>
</head>

<body>
    <h1>Please Insert Data!!</h1>
    <a href="page.php" style="background-color: red; color:aliceblue;">Back</a>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama Buku</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" required>
            </li>
            <li>
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" required>
            </li>
            <li>
                <label for="diterbitkan">Tanggal Terbit</label>
                <input type="text" name="diterbitkan" id="diterbitkan" required>
            </li>
            <li>
                <label for="halaman">Jumlah Halaman</label>
                <input type="text" name="halaman" id="halaman" required>
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submitdata" style="background-color: blue; color:aliceblue;" onclick="return confirm('Apakah yang di isikan sudah benar?')">Kirim!</button>
            </li>
        </ul>
    </form>
</body>

</html>