<?php
  session_start();
  include_once "../models/db_connection.php";

  $user_id = $_SESSION['user_id'];
  $sql = "SELECT note_id, data, date FROM notes WHERE user_id = ? ORDER BY date DESC";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($notes);