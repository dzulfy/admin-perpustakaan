<?php
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    return $rows;
    }
?>
<?php 
    if(isset($_POST ["submit"])){
        if($_POST ["username"] == "admin" && $_POST ["password"] == "123") {
            header("Location: page.php");
        }else{
            $error = true;
        }
    }
?>
<?php 
    function tambah($data) {
        global $conn;

        $nama = htmlspecialchars($data["nama"]);
        $pengarang = htmlspecialchars($data["pengarang"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $diterbitkan = htmlspecialchars($data["diterbitkan"]);
        $halaman = htmlspecialchars($data["halaman"]);

        // upload gambar
        $gambar = upload();
        if(!$gambar){
            return false;
        }

        $query = "INSERT INTO book VALUES
        ('', '$nama', '$pengarang', '$penerbit', '$diterbitkan', '$halaman', '$gambar')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);


    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if( $error === 4){
            echo "<scriot>
                    alert('silahkan pilih gambar terlebih dahulu!')
                  </script>";
            return false;        
        }
    }
    }
?>
<?php 
    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM book WHERE id = $id");

        return mysqli_affected_rows($conn);
    }
?>
<?php 
    function ubah ($data){
        global $conn;
        
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $pengarang = htmlspecialchars($data["pengarang"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $diterbitkan = htmlspecialchars($data["diterbitkan"]);
        $halaman = htmlspecialchars($data["halaman"]);
        $gambar = htmlspecialchars($data["gambar"]);

        $query = "UPDATE book SET
        nama = '$nama',
        pengarang = '$pengarang',
        penerbit = '$penerbit',
        diterbitkan = '$diterbitkan',
        halaman = '$halaman',
        gambar = '$gambar'
        WHERE id = $id";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    }
?>
<?php 
    function cari($keyword){
        $query = "SELECT * FROM book
        WHERE nama LIKE '$keyword%' OR
        pengarang LIKE '$keyword%' OR
        penerbit LIKE '$keyword%' OR
        diterbitkan LIKE '$keyword%'
        ";

        return query($query);
    }
?>