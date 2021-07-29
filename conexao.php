<?php
define('HOST', 'localhost');
define('USUARIO', 'usuario');
define('SENHA', 'senha');
define('DB', 'nomedobanco');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');