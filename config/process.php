<?php

session_start();

include_once("connection.php");
include_once("url.php");

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