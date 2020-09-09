<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rephp";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    for($i=1; $i<=20; $i++){
        $sql = "UPDATE real_estate SET bed_room = '1', living_room = '2', parking = '1', kitchen = '2' WHERE id = $i";
        if (mysqli_query($conn, $sql)){
            echo $i;
            echo " New record created successfully<br>";
        }
        else {
            echo "Error: " . $sql . "<br><br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>