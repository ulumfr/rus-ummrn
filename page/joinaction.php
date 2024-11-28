<?php
include "koneksi.php";

$projectid = $_POST['projectid'];
$studentid = $_POST['studentid'];
$motive = $_POST['motivation'];

$sql_check = "SELECT * FROM joinresearch WHERE id_project = ? AND id_student = ?";
$stmt_check = $koneksi->prepare($sql_check);
$stmt_check->bind_param("ii", $projectid, $studentid);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    echo "
        <script>
            window.alert('You have already registered for this project.');
            window.location.href='/index.php?page=notifications';
        </script>
    ";
} else {
    $sql_insert = "INSERT INTO joinresearch (id_project, id_student, motivation) VALUES (?, ?, ?)";
    $stmt_insert = $koneksi->prepare($sql_insert);

    if ($stmt_insert) {
        $stmt_insert->bind_param("iis", $projectid, $studentid, $motive);

        if ($stmt_insert->execute()) {
            echo "
                <script>
                    window.alert('Your request has been sent.');
                    window.location.href='/index.php?page=notifications';
                </script>
            ";
        } else {
            echo "
                <script>
                    window.alert('Failed to register. Please try again.');
                    window.location.href='/index.php?page=notifications';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                window.alert('Database error. Please try again later.');
                window.location.href='/index.php?page=notifications';
            </script>
        ";
    }
}

$stmt_check->close();
if (isset($stmt_insert) && $stmt_insert) {
    $stmt_insert->close();
}
$koneksi->close();
