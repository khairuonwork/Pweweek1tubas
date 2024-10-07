<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daffa Khairul Ammar 223443007</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
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
        .list-group-item {
            background-color: #ffffff;
            border: none;
            border-radius: 10px;
            margin-bottom: 10px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        tr.selected {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Lists</h2>

    <?php
        include_once('koneksi_data.php');
        $sql = mysqli_query($mysqli, "SELECT * FROM pwe1tubas ORDER BY id ASC");
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
                echo "<tr data-id='" . $row['id'] . "' data-name='" . $row['name'] . "' data-nim='" . $row['nim'] . "' data-email='" . $row['email'] . "'>
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

<!-- Buttons to trigger modals -->
<div class="text-center mt-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Data</button>
    <button type="button" class="btn btn-danger" id="deleteDataBtn" disabled>Delete Data</button>
    <button type="button" class="btn btn-warning" id="editDataBtn" disabled>Edit Data</button>
</div>

<!-- Add Data Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addDataForm">
          <div class="mb-3">
            <label for="addName" class="form-label">Name</label>
            <input type="text" class="form-control" id="addName" required>
          </div>
          <div class="mb-3">
            <label for="addNim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="addNim" required>
          </div>
          <div class="mb-3">
            <label for="addEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="addEmail" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirmAddBtn">Add Data</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Data Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete <span id="deleteDataName"></span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editDataForm">
          <input type="hidden" id="editId">
          <div class="mb-3">
            <label for="editName" class="form-label">Name</label>
            <input type="text" class="form-control" id="editName" required>
          </div>
          <div class="mb-3">
            <label for="editNim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="editNim" required>
          </div>
          <div class="mb-3">
            <label for="editEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="editEmail" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning" id="confirmEditBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var selectedRow = null;

        // Select row on click
        $('table tbody').on('click', 'tr', function() {
            if (selectedRow) {
                $(selectedRow).removeClass('selected'); // Deselect previous row
            }
            selectedRow = this; // Store the selected row
            $(this).addClass('selected'); // Highlight the selected row

            // Enable the delete and edit buttons
            $('#deleteDataBtn').prop('disabled', false);
            $('#editDataBtn').prop('disabled', false);
        });

        // Add Data
        $('#confirmAddBtn').click(function() {
            var name = $('#addName').val();
            var nim = $('#addNim').val();
            var email = $('#addEmail').val();

            $.ajax({
                url: 'add_data.php',
                type: 'POST',
                data: {
                    name: name,
                    nim: nim,
                    email: email
                },
                success: function(response) {
                    console.log(response); 
                    response = JSON.parse(response);
                    if (response.success) {
                        $('table tbody').append(`<tr data-id="${response.id}" data-name="${name}" data-nim="${nim}" data-email="${email}">
                            <td>${response.id}</td>
                            <td>${name}</td>
                            <td>${nim}</td>
                            <td>${email}</td>
                        </tr>`);
                        $('#addModal').modal('hide');
                        $('#addDataForm')[0].reset(); 
                    } else {
                        alert(response.message || 'Failed to add data');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                    alert('An error occurred: ' + error);
                }
            });
        });

        // Edit Data
        $('#editDataBtn').click(function() {
            if (selectedRow) {
                var id = $(selectedRow).data('id');
                var name = $(selectedRow).data('name');
                var nim = $(selectedRow).data('nim');
                var email = $(selectedRow).data('email');

                $('#editId').val(id);
                $('#editName').val(name);
                $('#editNim').val(nim);
                $('#editEmail').val(email);

                $('#editModal').modal('show');
            } else {
                alert('Please select a row to edit.');
            }
        });

        // Confirm and save the edited data
        $('#confirmEditBtn').click(function() {
            var id = $('#editId').val();
            var name = $('#editName').val();
            var nim = $('#editNim').val();
            var email = $('#editEmail').val();

            $.ajax({
                url: 'edit_data.php',
                type: 'POST',
                data: {
                    id: id,
                    name: name,
                    nim: nim,
                    email: email
                },
                success: function(response) {
                    console.log(response);
                    response = JSON.parse(response);
                    if (response.success) {
                        
                        $(selectedRow).data('name', name);
                        $(selectedRow).data('nim', nim);
                        $(selectedRow).data('email', email);
                        $(selectedRow).find('td:nth-child(2)').text(name);
                        $(selectedRow).find('td:nth-child(3)').text(nim);
                        $(selectedRow).find('td:nth-child(4)').text(email);
                        $('#editModal').modal('hide');
                    } else {
                        alert(response.message || 'Failed to update data');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                    alert('An error occurred: ' + error);
                }
            });
        });

        // Confirm and delete data
        $('#deleteDataBtn').click(function() {
            var id = $(selectedRow).data('id');
            var name = $(selectedRow).data('name');
            $('#deleteDataName').text(name);
            $('#deleteModal').modal('show');
        });

        $('#confirmDeleteBtn').click(function() {
            var id = $(selectedRow).data('id');

            $.ajax({
                url: 'delete_data.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    console.log(response); 
                    response = JSON.parse(response);
                    if (response.success) {
                        $(selectedRow).remove(); 
                        $('#deleteModal').modal('hide');
                        $('#deleteDataBtn').prop('disabled', true);
                        $('#editDataBtn').prop('disabled', true); 
                    } else {
                        alert(response.message || 'Failed to delete data');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                    alert('An error occurred: ' + error);
                }
            });
        });
    });
</script>
</body>
</html>
