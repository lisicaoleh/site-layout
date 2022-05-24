<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

$link = mysqli_connect('localhost', 'root', '', 'power');
mysqli_query($link, "SET NAMES utf8");


