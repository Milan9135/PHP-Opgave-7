<?php 

session_start();

echo $_SESSION['naam'] . "<br>";
echo $_SESSION['email'] . "<br>";

$ids = $_SESSION['ID'];

for($i = 0; isset($ids[$i]); $i++) {  
    echo "ids: " . $ids[$i][0] . "<br>";
}

?>