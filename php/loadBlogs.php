<?php
include "./db.php";
$query = "SELECT `id`, `image`,`topic`,`popularity`, `description` FROM `blogs`";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo json_encode($result->fetch_all());
} else {
    echo json_encode("no data found");
}
?>