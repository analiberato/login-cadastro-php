<?php
session_start();
include("conexao.php");

$_SESSION['status_cadastro'] = false;

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from usuario where cpf = '$cpf'"; 
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // invalid emailaddress
    $_SESSION['email_invalido'] = true;
    header('Location: cadastro.php');
	exit;
}

function validaCPF($cpf) {

    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

if(!validaCPF($cpf)) {
    $_SESSION['cpf_invalido'] = true;
    header('Location: cadastro.php');
	exit;
}

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO usuario (cpf, email, senha, nome, data_cadastro) VALUES ('$cpf', '$email', '$senha', '$nome', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;
?>