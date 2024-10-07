<?php
include_once('koneksi_data.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM pwe1tubas WHERE id = $id";
    if(mysqli_query($mysqli, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
