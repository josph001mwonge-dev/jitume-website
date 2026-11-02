<?php
require_once "db.php.txt";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
	http_response_code(405);
	exit("invalid request method.");
}

$fname = trim($_POST["first_name"]?? "");
$lname = trim($_POST["last_name"] ?? "");
$id = trim($_POST["id_number"] ?? "");
$phone = trim($_POST["phone_number"] ?? "");
$comment = trim($_POST["comment"] ?? "");

$stmt = $conn->prepare(
"INSERT INTO students
	(first_name, last_name, id, phone, comment)
VALUES (?,?,?,?,?)"
);

$stmt->bind_param(
	"sssss",
	$fname,
	$lname,
	$id,
	$phone,
	$comment);

if ($stmt->execute()) {
	$safe_name = htmlspecialchars(
	str_pad((string)$id,5, "0",STR_PAD_LEFT),
	ENT_QUOTES,
	"UTF-8"
	);
}
?>