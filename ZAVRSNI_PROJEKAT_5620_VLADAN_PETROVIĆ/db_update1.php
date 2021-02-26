<?php

    require_once "connection.php";

    $sql = "ALTER TABLE profiles ADD bio TEXT";

    if($conn->query($sql)) {
        echo "<p>Kolona je uspesno dodata u tabelu porfiles</p>";
    }


?>