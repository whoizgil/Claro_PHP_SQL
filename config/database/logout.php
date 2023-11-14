<?php
session_start();
session_destroy();
echo "<script>alert('Você saiu da sua conta!'); window.location.href='../../index.php';</script>";
exit();
