<?php
$hostname = "localhost";
$usuario = "root";
$senha = "clarophpsql!";
$bancodedados = "projetoback";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_error) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
};
