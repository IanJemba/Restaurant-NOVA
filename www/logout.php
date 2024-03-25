<?php

unset($_SESSION);
session_destroy();
header("Location: homepage.php");
exit;
