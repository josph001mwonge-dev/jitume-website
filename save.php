<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
	http_response_code(405);
	exit("invalid request method.");
}

$fname = trim($_POST["first_name"]?? "");
$lname = trim($_POST["last_name"] ?? "");
$id = trim($_POST["id_number"] ?? "");
$phone = trim($_POST["phone_number"] ?? "");
$comment = trim($_POST["comment"] ?? "");

$sql = "INSERT INTO students
(first_name, last_name,id_number,phone_number,comment)
VALUES (?,?,?,?)";

stmt = $conn->prepare($sql);

$stmt->bind_param(
	"sss",
	$fname,
	$lname,
	$id,
	$phone,
	$comment);

if ($stmt->execute()) {
	echo "student registered successfully!";
}else {
	echo "error: ". $stmt->error;
}
$safe_name = htmlspecialchars(
	$full_name,
	ENT_QUOTES,
	"UTF-8"
	);
$stmt->close();
$stmt->close();
?>