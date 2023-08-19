<?php 
    require "function.php";
    $book = query("SELECT * FROM book");
    // tombol cari ditekan
    if(isset($_POST["cari"])){
        $book = cari($_POST["keyword"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style> 
        .a-logout{
            float: right;
            width: 50;  
        }
    </style>
    <title>Library</title>
</head>
<body>
    <h1>Library Book Film</h1>
    <a href="tambah.php">Tambah Data Buku</a>
    <br></br>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="cari data buku..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br></br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Diterbitkan</th>
                <th>Halaman</th>
            </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($book as $row) : ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]?>">Ubah</a> | 
                <a href="hapus.php?id=<?= $row["id"]?>" onclick="return confirm('Apakah anda yakin akan menghapus data tersebut?')">Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]?>"width="50"></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["pengarang"] ?></td>
            <td><?= $row["penerbit"] ?></td>
            <td><?= $row["diterbitkan"] ?></td>
            <td><?= $row["halaman"] ?> Halaman</td>
        </tr>
        <?php $i ++ ?>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="index.php" style="background-color: red; color:aliceblue;" class="a-logout">Logout</a>        
</body>
</html>