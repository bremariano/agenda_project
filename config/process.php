<?php

session_start();

include_once("connection.php");
include_once("url.php");

$contacts = [];

$query = "SELECT * FROM contacts";

$smt = $conn->prepare($query);

$smt->execute();

$contacts = $smt->fetchAll();