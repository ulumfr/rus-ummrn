<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['userid'])) {
    $userId = intval($_SESSION['userid']); 
    $comment = $_POST['comment'];
    $id_project = $_POST['id_project'];

    if (!empty($comment) && !empty($id_project)) {
        $insert_sql = "INSERT INTO comments (id_project, id_student, comment) 
                       VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($insert_sql);

        $stmt->bind_param('iis', $id_project, $userId, $comment);

        if ($stmt->execute()) {
            header("Location: index.php?page=detailproject&id=$id_project");  
            exit();  
        } else {
            echo "<div class='col-12'><p class='text-danger'>Error adding comment. Please try again later.</p></div>";
        }
    } else {
        echo "<div class='col-12'><p class='text-danger'>Comment cannot be empty.</p></div>";
    }
} else {
    echo "<div class='col-12'><p class='text-danger'>You must be logged in to add a comment.</p></div>";
}
?>
