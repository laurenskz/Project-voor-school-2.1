<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Google Map with Multiple Location</title>
    <script type="text/javascript" src="Map.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        function GetValues() {
            <?php
                $conn = mysqli_connect("localhost", "jules", "HPPbHqs4dXhKRTdr");
                $sql = "SELECT * from leertaak5.stations";
                $result = mysqli_query($conn, $sql);
                $i = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "contentstring[$i] = \"".$row['name'].", ".$row['country']."\";";
                    echo "regionlocation[$i] = \"".$row['latitude'].", ".$row['longitude']."\";";
                    echo "stationIDs[$i] = ".$row['stn'].";";
                    $i++;
                }

                mysqli_close($conn);

            ?>


        }
        $(document).ready(function () {
            setTimeout(function() { initialize(); }, 400);
        });
    </script>


</head>
<body>
<center>
    <div id="Map" style="width: 921px; height: 600px;">
</center>
<button onclick="viewDetails()">More details</button>
<p id="demo"></p>
</div>
</body>
</html>
