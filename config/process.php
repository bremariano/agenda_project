<?php

session_start();

include_once("connection.php");
include_once("url.php");

$data = $_POST;

//Database modifications
if (!empty($data)) {
    //Create contact
    if ($data["type"] === "create") {

        $name = $data["name"];
        $phone = $data["phone"];
        $observation = $data["observations"];

        $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);

        $stmt->bindParam(":phone", $phone);

        $stmt->bindParam(":observations", $observation);

        try {

            $stmt->execute();
            $_SESSION['msg'] = "Contact successfully created!";

        }catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }

    } elseif ($data["type"] === "edit") {
        $id = $data["id"];
        $name = $data["name"];
        $phone = $data["phone"];
        $observation = $data["observations"];

        $query = "UPDATE contacts 
                  SET name = :name, phone = :phone, observations = :observations
                  WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observation);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            $_SESSION['msg'] = "Contact successfully updated!";

        }catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }

    // REDIRECT HOME
    header("Location:" . $BASE_URL . "../index.php");
    //Data selection
}else {

    $id;

    if (!empty($_GET)) {
        $id = $_GET['id'];
    }
//returns data from a contact
    if (!empty($id)) {

        $query = "SELECT * FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $contact = $stmt->fetch();

    }else {

//returns all contacts
        $contacts = [];

        $query = "SELECT * FROM contacts";

        $smt = $conn->prepare($query);

        $smt->execute();

        $contacts = $smt->fetchAll();
    }
}

// Close connection

$conn = null;
