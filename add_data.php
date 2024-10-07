<?php
include_once('koneksi_data.php');

if (isset($_POST['name'], $_POST['nim'], $_POST['email'])) {
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];

    $query = "INSERT INTO pwe1tubas (name, nim, email) VALUES ('$name', '$nim', '$email')";
    if (mysqli_query($mysqli, $query)) {
        echo json_encode([
            'success' => true,
            'id' => mysqli_insert_id($mysqli)
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
