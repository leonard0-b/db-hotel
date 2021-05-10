<?php
  include "db.php";

  header('Content-Type: application/json');

  if(!empty($_GET) && $_GET['id']) {
    $id = $_GET['id'];
    $result = [];

    $stmt = $conn->prepare("SELECT * FROM stanze WHERE id = ?"); //prepara query
    $stmt->bind_param("i", $id); // sostituisce i dati della chiamata ajax

    //set parmeters and execute 
    $stmt->execute(); //eseguo il codice sql
    $rows = $stmt->get_result(); //salva i risultati in una variabile
    while ($row = $rows->fetch_assoc()) { //ciclo i risultati e li trasforma in array associativi
      $result[] = $row; //pusho i risultati dentro all'array results
    } 

    echo json_encode([
      "response" => $result,
      "success" => true
    ]);

  } else {

    $sql = "SELECT * FROM stanze";
    $rows = $conn->query($sql);
    $result= [];

    if ($rows && $rows->num_rows > 0) {
      //output data for each row
      while ($row = $rows->fetch_assoc()) {
        $result[] = $row;
      }
    }

    echo json_encode([
      "response" => $result,
      "success" => true
    ]);
  }

  $conn->close();
?>