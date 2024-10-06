<?php
    include_once('koneksi_data.php');
    if(isset($_POST['name']) && isset($_POST['nim']) && isset($_POST['email'])){
        $name = $_POST['name'];
        $nim = $_POST['nim'];
        $email = $_POST['email'];

        $sql = mysqli_query($mysqli, "INSERT INTO pwe1 (name, nim, email) VALUES ('$name', '$nim', '$email')");

        if($sql === TRUE){
            echo "<br>Data Berhasil Disimpan";
        } else {
            echo "Data Tidak Valid";
        }
    }
?>
