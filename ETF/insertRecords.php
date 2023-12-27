<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "lcuAcademy");
if ($conn->connect_error) {
  die('Error connecting to the database: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = $_POST;

  $student_id = $data['student_id'];
  $first_name = $data['first_name'];
  $last_name = $data['last_name'];
  $email = $data['email'];
  $near_city = $data['near_city'];
  $guardian = $data['guardian'];

  $sql = "INSERT INTO student (sid, firstName, lastName, email, nearCity, guardian)
          VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssss", $student_id, $first_name, $last_name, $email, $near_city, $guardian);

  $response = array();

  if ($stmt->execute()) {
    $response['message'] = 'Student record inserted successfully';
  } else {
    $response['message'] = 'Error inserting student record: ' . $stmt->error;
  }

  $stmt->close();

  echo json_encode($response);
}
