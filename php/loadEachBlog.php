<?php
include "./db.php";
$id = $_POST["id"];
$query = "SELECT `id`, `image`, `topic`, `popularity`, `description` FROM `blogs` WHERE `id` = '$id'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode("no data found");
}
?>