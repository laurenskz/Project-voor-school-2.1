<!DOCTYPE html>

<head>
    <title>Station information</title>
</head>
<?php
    $stationID = $_GET['id'];
    $conn = mysqli_connect("localhost", "jules", "HPPbHqs4dXhKRTdr");
    $sql = "SELECT * from leertaak5.stations where stn = $stationID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'].", ". $row['country'];
    echo "<h1>$name</h1>";
    echo "Station id: ". $row['stn']."<br/>";
    $sql = "SELECT * from leertaak5.stations where stn = $stationID";
?>

</body>


</hmtl>
