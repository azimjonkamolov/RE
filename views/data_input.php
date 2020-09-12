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
    for($i=1; $i<=4; $i++){
        $sql = "INSERT INTO agents (agent_name, agent_email, agent_phone, agent_address, agent_about, agent_image) 
        VALUES ('Tom $i', 'tom@email.com', '010-1020-3040', 'Seoul', 'Very talented and out-going seller of houses', '$i.jpg')";
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