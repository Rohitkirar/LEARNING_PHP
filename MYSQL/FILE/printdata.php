<?php 
$queryResult = $conn->query($sql);
$result = $queryResult->fetch_all(MYSQLI_ASSOC);
echo "<table style='border:1px solid black; text-align:center; padding:12px;'>";

foreach($result as $values){
    echo "<tr>";
    foreach($values as $key => $value ){
        echo "<th  style='text-align:center;'>$key</th>";
    }
    echo "</tr>";
    break;
}
foreach($result as $values){
    echo "<tr>";
    foreach($values as $value ){
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>