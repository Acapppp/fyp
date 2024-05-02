<?php
// session_start();

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

require __DIR__ ."/connection.php";

$sql = "UPDATE staff_info SET reset_token_hash = ?,
                              reset_token_expires_at = ?
                              WHERE staff_email = ?";

$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "sss", $token_hash, $expiry, $email);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

mysqli_close($con);
?>
