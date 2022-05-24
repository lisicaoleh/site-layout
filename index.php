<?php
require 'elems/init.php';

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = '/';
    }
    
    $result = mysqli_query($link, "SELECT * FROM pages WHERE url = '$page'") or die(mysqli_error($link));
    $page = mysqli_fetch_assoc($result);
    if(!$page){
        $result = mysqli_query($link, "SELECT * FROM pages WHERE url = '404'") or die(mysqli_error($link));
        $page = mysqli_fetch_assoc($result);
        header("HTTP/1.1 404 Not Found");
    }
    
    $content = $page['text'];
    $title = $page['title'];
include 'elems/layout.php';
