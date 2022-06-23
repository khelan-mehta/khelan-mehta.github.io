<?php

    $name = $_POST['name'];

    $conn = new mysli('localhost','root','','test');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die('connection failed : '.$conn->connect_error) 
    } else {
        $stmt = $conn->prepare("insert into names(name) values(?)");
        $stmt->bind_param("s", $name);
        $execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
    }


?>