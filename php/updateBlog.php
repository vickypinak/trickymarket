<?php
include "./db.php";

$imageUploadPath = __DIR__ . "/../img/uploads/";
$imageUploadFile = $imageUploadPath . $_FILES["editFile"]["name"];
$isUploaded = TRUE;
$imageFileType = strtolower(pathinfo($imageUploadFile, PATHINFO_EXTENSION));

//UploadImageToServer
$check = getimagesize($_FILES["editFile"]["tmp_name"]);
if($check !== FALSE) {
  $isUploaded = TRUE;
//   echo "file checked.";
} else {
  $isUploaded = FALSE;
//   echo "File path error : " . $_FILES["uploadFile"]["name"];
}
if($isUploaded === TRUE) {
    if($imageFileType == "jpg" || $imageFileType == 'jpeg' || $imageFileType == 'png') {
        $temp = str_replace(' ', '', $_FILES["uploadFile"]["name"]);
        $imageUploadFile = time() . $temp;
        if (move_uploaded_file($_FILES["editFile"]["tmp_name"], $imageUploadPath . $imageUploadFile)) {
            $image = $imageUploadFile;
            $id = $_POST["id"];
            $description = $_POST["editDescription"];
            $topic = $_POST["editTopic"];
            $popularity = $_POST["editPopularity"];
            $query = "UPDATE `blogs` SET `image` = '$image', `topic`='$topic', `popularity`='$popularity', `description`='$description' WHERE `id` = '$id'";
            if($conn->query($query) === TRUE) {
               //TODO redirect after uploading
               echo "redirecting";
            //    echo "<br> id = $id image = $image descriptipn = $description";
                header("Location: https://trickymarket.in/admin.html?success=2");
            } else {
                echo "<br>error: " . $conn->error;
            }
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
    } else {
        echo "Please select an Image File.";
    } 
} else {
  echo "No Image";
  $id = $_POST["id"];
  $description = $_POST["editDescription"];
  $topic = $_POST["editTopic"];
  $popularity = $_POST["editPopularity"];
  $query = "UPDATE `blogs` SET `topic`='$topic', `popularity`='$popularity', `description`='$description' WHERE `id` = '$id'";
  if($conn->query($query) === TRUE) {
     //TODO redirect after uploading
     echo "redirecting";
  //    echo "<br> id = $id image = $image descriptipn = $description";
      header("Location: https://trickymarket.in/admin.html?success=2");
  } else {
      echo "<br>error: " . $conn->error;
  }
}
?>