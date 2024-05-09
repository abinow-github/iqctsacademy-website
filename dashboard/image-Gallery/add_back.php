<?php







if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["category"])) {
        $selectedCategory = $_POST["category"];

        // Define the target directory for uploaded images based on the category.
        $targetDirectory = '../gallery/' . $selectedCategory . '/';

        // Create the target directory if it doesn't exist.
        

        // Loop through the uploaded files.
        if (isset($_FILES['images']['name'])) {
            $count = count($_FILES['images']['name']);
            for ($i = 0; $i < $count; $i++) {
                $fileName = $_FILES['images']['name'][$i];
                $tempFilePath = $_FILES['images']['tmp_name'][$i];
                $targetFilePath = $targetDirectory . $fileName;

                // Check if the file is an image.
                $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                if (getimagesize($tempFilePath) !== false) {
                    if (move_uploaded_file($tempFilePath, $targetFilePath)) {
                        // Insert image details into a MySQL database.
                        $dbHost = "localhost";
                        $dbUser = "root";
                        $dbPassword = "";
                        $dbName = "iqcts";

                        $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

                        if ($conn) {
                            // You may need to sanitize the input to prevent SQL injection.
                            $imageTitle = "Your Image Title"; // You can customize this.
                            $sql = "INSERT INTO gallery (image,img_name) VALUES ('$selectedCategory', '$fileName')";

                            if (mysqli_query($conn, $sql)) {
                                echo "File $fileName uploaded and inserted into the database successfully.<br>";
                            } else {
                                echo "Error inserting data into the database: " . mysqli_error($conn) . "<br>";
                            }
                            mysqli_close($conn);
                        } else {
                            echo "Database connection failed.<br>";
                        }
                    } else {
                        echo "Error uploading $fileName to category: $selectedCategory.<br>";
                    }
                } else {
                    echo "File $fileName is not an image.<br>";
                }
            }
        }
    } else {
        echo "Please select a category.";
    }
}



														 

header("location:index.php?pro=$menu");
?>										  
										  				   