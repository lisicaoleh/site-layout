<?php

if(isset($_SESSION['message'])){
    $info = $_SESSION['message']['info'];
    $status = $_SESSION['message']['status'];
    $info = "<h2 class='$status'>$info</h2>";
}else{
    $info = '';
}

