<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daffa Khairul Ammar 223443007</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            max-width: 600px;
        }
        .list-group-item {
            background-color: #ffffff;
            border: none;
            border-radius: 10px;
            margin-bottom: 10px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Menambahkan Data</h2>
    <form id="myForm">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Masukkan Nama">
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM:</label>
            <input type="text" class="form-control" id="nim" placeholder="Masukkan NIM">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address:</label>
            <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
        </div>
        <input type="button" id="submitBtn" class="btn btn-primary w-100" value="Submit">
    </form>

    <div id="message" class="mt-3"></div>

    <h3 class="mt-5">Submitted Data:</h3>
    <ul id="dataList" class="list-group"></ul>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitBtn').click(function() {
            var name = $('#name').val();
            var nim = $('#nim').val();
            var email = $('#email').val();
            var errorMessage = '';

            // Validate fields
            if (name == '') errorMessage += 'Nama tidak boleh kosong.<br>';
            if (nim == '') errorMessage += 'NIM tidak boleh kosong.<br>';
            if (email == '') errorMessage += 'Email tidak boleh kosong.<br>';

            if (errorMessage != '') {
                $('#message').html('<div class="alert alert-danger">' + errorMessage + '</div>');
            } else {
                $('#message').html('');
                $.ajax({
                    url: 'simpan_data.php',
                    type: 'POST',
                    data: { name: name, nim: nim, email: email },
                    success: function(response) {
                        $('#message').html('<div class="alert alert-success">Data submitted successfully!</div>');

                        // Add the data to the list
                        $('#dataList').append(
                            '<li class="list-group-item">' +
                            '<strong>Name:</strong> ' + name + '<br>' +
                            '<strong>NIM:</strong> ' + nim + '<br>' +
                            '<strong>Email:</strong> ' + email +
                            '</li>'
                        );

                        // Clear the form fields
                        $('#name').val('');
                        $('#nim').val('');
                        $('#email').val('');
                    }
                });
            }
        });
    });
</script>

</body>
</html>
