<?php
//connect Database
include "./db.php";

$imageUploadPath = __DIR__ . "/../img/uploads/";
$imageUploadFile = $imageUploadPath . $_FILES["uploadFile"]["name"];
$isUploaded = TRUE;
$imageFileType = strtolower(pathinfo($imageUploadFile, PATHINFO_EXTENSION));

//UploadImageToServer
$check = getimagesize($_FILES["uploadFile"]["tmp_name"]);
if($check !== FALSE) {
  $isUploaded = TRUE;
//   echo "file checked.";
} else {
  $isUploaded = FALSE;
//   echo "File path error : " . $_FILES["uploadFile"]["name"];
echo "Please select an Image File.";
}
if($isUploaded === TRUE) {
    if($imageFileType == "jpg" || $imageFileType == 'jpeg' || $imageFileType == 'png') {
        $temp = str_replace(' ', '', $_FILES["uploadFile"]["name"]);
        $imageUploadFile = time() . $temp;
        if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $imageUploadPath . $imageUploadFile)) {
            $image = $imageUploadFile;
            $description = $_POST["description"];
            $topic = $_POST["topic"];
            $popularity = $_POST["popularity"];
            $query = "INSERT INTO `blogs` (`image`,`description`,`topic`,`popularity`) VALUES ('$image','$description','$topic', '$popularity')";
            if($conn->query($query) === TRUE) {
               //TODO redirect after uploading
               echo "redirecting";
                header("Location: https://trickymarket.in/admin.html?success=1");
            } else {
                echo "<br>error: " . $conn->error;
            }
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
    } else {
        echo "Please select an Image File.";
    } 
}


?>
