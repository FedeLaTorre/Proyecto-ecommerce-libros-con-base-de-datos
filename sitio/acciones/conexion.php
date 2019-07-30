<?php

const DB_HOST = "127.0.0.1";
const DB_USER = "root";
const DB_PASS = "";
const DB_BASE = "mangas";


$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE);



mysqli_set_charset($db, 'utf8mb4');
