<?php
//פונקציה שמוציאה את המשתמש מהמערכת-ומוחקת את הסשן שלו
session_start();
session_destroy();
header("location: index.php");