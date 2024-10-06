<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daffa Khairul Ammar 223443007</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        .container {
            margin-top: 40px;
            max-width: 900px;
        }
        table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th {
            background-color: #007bff;
            color: white;
        }
        th, td {
            text-align: center;
            padding: 10px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Menampilkan Data</h2>

    <?php
        include_once('koneksi_data.php');
        $sql = mysqli_query($mysqli, "SELECT * FROM pwe1 ORDER BY id ASC");
        if($sql->num_rows > 0) {
            echo "<table class='table table-bordered table-hover'>
                <thead class='table-primary'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>NIM</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>";
            while($row = $sql->fetch_assoc()){
                echo "<tr>
                    <td>". $row['id']. "</td>
                    <td>". $row['name']. "</td>
                    <td>". $row['nim']. "</td>
                    <td>". $row['email']. "</td>
                </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning'>Belum ada data.</div>";
        }
    ?>
</div>

</body>
</html>
