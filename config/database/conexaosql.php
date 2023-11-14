<?php
$hostname = "localhost";
$usuario = "root";
$senha = "beth1805!";
$bancodedados = "projetoback";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_error) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
};
