<?php
include_once('koneksi_data.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];

    $stmt = $mysqli->prepare("UPDATE pwe1tubas SET name = ?, nim = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $nim, $email, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Data updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update data.']);
    }
    $stmt->close();
}
?>
