<?php
session_start();
include_once "koneksi.php";

if (!isset($_SESSION['userid']) || empty($_SESSION['userid'])) {
    echo "You must be logged in to update your profile.";
    exit;
}

try {
    $userId = intval($_SESSION['userid']);
    $usr = htmlspecialchars($_POST['usr']);
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $nim = htmlspecialchars($_POST['nim']);
    $phone = htmlspecialchars($_POST['phone']);
    $description = htmlspecialchars($_POST['description']);
    $psw = isset($_POST['psw']) ? $_POST['psw'] : null;

    if (!empty($psw)) {
        $hashedPassword = md5($psw);
    } else {
        $hashedPassword = null;
    }

    $sql = "UPDATE students SET usr = ?, email = ?, name = ?, nim = ?, phone = ?, description = ? " . ($hashedPassword ? ", psw = ?" : "") . " WHERE id_student = ?";
    $stmt = $koneksi->prepare($sql);

    if ($hashedPassword) {
        $stmt->bind_param("sssssssi", $usr, $email, $name, $nim, $phone, $description, $hashedPassword, $userId);
    } else {
        $stmt->bind_param("ssssssi", $usr, $email, $name, $nim, $phone, $description, $userId);
    }

    if ($stmt->execute()) {
        header("Location: index.php?page=user-profile&status=success");
    } else {
        header("Location: index.php?page=user-profile&status=error");
    }

    $stmt->close();
} catch (mysqli_sql_exception $e) {
    echo "Error updating profile: " . $e->getMessage();
}
