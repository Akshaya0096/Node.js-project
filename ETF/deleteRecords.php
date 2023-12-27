<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "lcuAcademy");
if ($conn->connect_error) {
  die('Error connecting to the database: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = $_POST;

  $student_id = $data['student_id'];

  $sql = "DELETE FROM student WHERE sid = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $student_id);

  $response = array();

  if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
      $response['message'] = 'Student record deleted successfully';
    } else {
      $response['message'] = 'No student record found with the provided SID';
    }
  } else {
    $response['message'] = 'Error deleting student record: ' . $stmt->error;
  }

  $stmt->close();

  echo json_encode($response);
}
?>
