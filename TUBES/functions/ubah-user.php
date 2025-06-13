<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header ("Location: ../auth/login.php");
  exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$prof = query("SELECT * FROM professors WHERE id = $id") [0];

// cek apakah tombol submit sudah ditekan atau belum
if ( isset ($_POST ["submit"]) ) {

    // cek apakah data berhasil diubah atau tidak
    if ( ubah($_POST) > 0) {
        echo "
            <script>
                alert ('data berhasil diubah!');
                document.location.href = '../user/user-index.php';
            </script>
        ";
    } else {
        echo "<script>
                alert ('data gagal diubah!');
                document.location.href = '../user/user-index.php';
            </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: #0d6efd;
        }
        .img-preview {
            max-width: 100px;
            max-height: 100px;
            margin-bottom: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="form-container">
            <h1 class="form-title">Ubah Data Professors</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $prof["id"]; ?>">
                <input type="hidden" name="gambarLama" value="<?= $prof["gambar"]; ?>">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required value="<?= $prof["name"]; ?>">
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="class" class="form-label">Class</label>
                        <input type="text" class="form-control" name="class" id="class" required value="<?= $prof["class"]; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="subclass" class="form-label">Subclass</label>
                        <input type="text" class="form-control" name="subclass" id="subclass" required value="<?= $prof["subclass"]; ?>">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" class="form-control" name="role" id="role" required value="<?= $prof["role"]; ?>">
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" required><?= $prof["description"]; ?></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="gambar" class="form-label">Current Image</label>
                    <div>
                        <img src="../img/uploaded_img/<?= $prof['gambar']; ?>" class="img-preview" id="imagePreview">
                    </div>
                    <label for="gambar" class="form-label mt-2">Change Image</label>
                    <input type="file" class="form-control" name="gambar" id="gambar" onchange="previewImage(this)">
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update Data
                    </button>
                    <a href="admin-index.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "../img/uploaded_img/<?= $prof['gambar']; ?>";
            }
        }
    </script>
</body>
</html>