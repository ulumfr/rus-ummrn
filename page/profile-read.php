<?php
session_start();
include_once "koneksi.php";

if (isset($_SESSION['userid'])) {
    $userId = intval($_SESSION['userid']);
    $sql = "SELECT * FROM students WHERE id_student = ?";
    $stmt = $koneksi->prepare($sql);
    if (!$stmt) {
        echo "<div class='col-12'><p class='text-danger'>Failed to prepare the statement: " . $koneksi->error . "</p></div>";
        exit;
    }
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $profile = $result->fetch_assoc();
    } else {
        $profile = null;
        echo "<div class='col-12'><p class='text-muted'>No profile data found.</p></div>";
    }
} else {
    echo "<div class='col-12'><p class='text-danger'>You must be logged in to view your profile.</p></div>";
}
