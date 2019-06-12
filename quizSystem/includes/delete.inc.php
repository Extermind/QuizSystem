<?php
    require 'dbh.inc.php';


$q = "DELETE FROM " . $_GET['table'] . " WHERE id=".$_GET['id'];
$conn->query($q);
header("Location: ../show.php?table=".$_GET['table']);












?>