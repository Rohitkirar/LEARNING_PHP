<?php 
$queryResult = $conn->query($sql);
$result = $queryResult->fetch_all(MYSQLI_ASSOC);

echo "<pre>" ; 
print_r($result);
echo "</pre>";
?>