<?php
session_start();
/* Declaração de Variáveis */
// $user = @$_POST['user'];
// $pass = @$_POST['pass'];
// $submit = @$_POST['submit'];

/* Declaração das variáveis que possuem os usuários e as senhas */
$user1 = 'douglas';
$pass1 = '123';
$nome1 = "Douglas Carvalho";

$user2 = 'maikel';
$pass2 = '123';
$nome2 = "Maikel Morales";

$user3 = 'patricia';
$pass3 = '123';
$nome3 = "Patrícia de Souza";

$user4 = 'rodrigo';
$pass4 = '123';
$nome4 = "Rodrigo Cezario da Silva";

$user5 = 'savana';
$pass5 = '123';
$nome5 = "Savana Tezza";

/* Testa se o botão submit foi ativado */
// if ($submit) {
//     /* Se o campo usuário ou senha estiverem vazios geramos um alerta */
//     if ($user == "" || $pass == "") {
//         echo "<script language=javascript>alert('Por favor, preencha todos os campos!');</script>";
//         echo "<script language=javascript>window.location.replace('index.php');</script>";
//     }
//     /* Caso o campo usuário e senha não 
//             *estejam vazios vamos testar se o usuário e a senha batem 
//         *iniciamos uma sessão e redirecionamos o usuário para o painel */ else {
//         if (($user == $user1 && $pass == $pass1) || ($user == $user2 && $pass == $pass2)
//             || ($user == $user3 && $pass == $pass3) || ($user == $user4 && $pass == $pass4)
//             || ($user == $user5 && $pass == $pass5)
//         ) {
//             session_start();
//             $_SESSION['usuario_logado'] = $user;
//             header("Location: index.php");
//         }/* Se o usuario ou a senha não batem alertamos o usuário */ else {
//             echo "<script language=javascript>alert('Usuário e/ou senha inválido(s), Tente novamente!');</script>";
//             echo "<script language=javascript>window.location.replace('login.php');</script>";
//         }
//     }
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo "processando login...";
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    /* Se o campo usuário ou senha estiverem vazios geramos um alerta */
    if ($user == "" || $pass == "") {
        echo "<script language=javascript>alert('Por favor, preencha todos os campos!');</script>";
        echo "<script language=javascript>window.location.replace('login.php');</script>";
    }

    if (($user == $user1 && $pass == $pass1) || ($user == $user2 && $pass == $pass2) || ($user == $user3 && $pass == $pass3)
        || ($user == $user4 && $pass == $pass4) || ($user == $user5 && $pass == $pass5)
    ) {
        //sucesso!
        $_SESSION["usuario_logado"] = $user;
        //redirecionar
        header("Location: index.php");
    }/* Se o usuario ou a senha não batem alertamos o usuário */ else {
        echo "<script language=javascript>alert('Usuário e/ou senha inválido(s), Tente novamente!');</script>";
        echo "<script language=javascript>window.location.replace('login.php');</script>";
    }
}
