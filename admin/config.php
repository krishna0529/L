<?php

$conn = mysqli_connect("localhost", "root", "", "mys");

if (!$conn) {
    echo "Connection Failed";
}