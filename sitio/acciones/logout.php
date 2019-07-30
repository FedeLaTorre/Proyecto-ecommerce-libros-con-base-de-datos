<?php

session_start();


unset($_SESSION['idusuarios'], $_SESSION['email']);

header('Location: ../index.php?s=home');