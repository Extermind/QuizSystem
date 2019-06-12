<?php
    require 'dbh.inc.php';

$q = "SELECT realCount FROM questioncount WHERE idCount=1;";
$realCountResult = $conn->query($q);
while ($realCountRow= $realCountResult->fetch_assoc()){
    $countOfQ = $realCountRow['realCount'];
}
?>