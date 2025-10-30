<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>
    <h1>Upload a File</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="myFile" required>
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        if (isset($_FILES['myFile']) && $_FILES['myFile']['error'] === 0) {
            $fileName = $_FILES['myFile']['name'];
            $fileTmpPath = $_FILES['myFile']['tmp_name'];
            $fileSize = $_FILES['myFile']['size'];
            $fileType = $_FILES['myFile']['type'];
            $allowesExtensions = ['jpg', 'jpeg', 'png'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (in_array($fileExtension, $allowesExtensions)) {
                $uploadDir = 'uploads/';
                $destination = $uploadDir . basename($fileName);
                if (move_uploaded_file($fileTmpPath, $destination)) {
                    echo "<p style='color:green;'>File uploaded successfully!</p>";
                    echo "File name: $fileName<br>";
                    echo "File type: $fileType<br>";
                    echo "File size: " . round($fileSize / 1024, 2) . " KB<br>";
                    echo "<p><a href='$destination' target='_blank'>View file</a></p>";
                } else {
                    echo "<p style='color:red;'>Error moving uploaded file!</p>";
                }
            } else {
                echo "<p style='color:red;'>Invalid file type. Only JPG, PNG, GIF, PDF, TXT allowed.</p>";
            }
        } else {
            echo "<p style='color:red;'>No file uploaded or upload error occurred.</p>";
        }
    }
    ?>
</body>

</html>