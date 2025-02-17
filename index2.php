<?php

require_once "configuracoes.php";
require_once "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $publicacao = new Publicacao;
        $dao = new PublicacaoDao;

        //desafio: realizar o tratamentos verificando a existencia do valor
        //desafio 2: usar DTO
        $publicacao->setAutor($_POST["nome"]);
        $publicacao->setTexto($_POST["texto"]);
        $publicacao->setCurtida($_POST["curtida"]);
        $publicacao->setData($_POST[""]);


        if ($publicacao == "" || $foto == "") {
            echo "<script language=javascript>alert('Por favor, preencha todos os campos!');</script>";
            echo "<script language=javascript>window.location.replace('login.php');</script>";
        }

        $publicacao->setTexto($_POST["texto"]);

        $foto = uploadFotos($_FILES["file"]);
        $publicacao->setFoto($foto);

        $dao->salvar($publicacao);

        // echo "Usuário cadastrado com sucesso!";
        echo "<script language=javascript>alert('Publicação postada com sucesso!');</script>";
        echo "<script language=javascript>window.location.replace('index2.php');</script>";
    } catch (\Throwable $th) {
        echo "Erro: " . $th->getMessage();
    }
}



// if (isset($_POST['publish'])){
//     if ($_FILES['file']['error'] > 0){
//         $texto = $_POST["texto"];
//         $hoje = date("Y-m-d");


// }

function verificaLogado()
{
    if (!isset($_SESSION["usuario_logado"])) {
        //se não estiver logado, vai redirecionar para a pág de login(login.php) 
        header("Location: login.php");
    }

    $pessoa = unserialize($_SESSION["usuario_logado"]);
    return $pessoa;
}

session_start();
$pessoa = verificaLogado(); //chamada da função

?>

<!--Esta é a página pessoal do usuário-->
<!DOCTYPE html />
<html lang="pt-BR" />

<head>
    <meta charset="UTF-8" />
    <title>Home - Logado</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/index2.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <!-- ícones  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://kit.fontawesome.com/7ae77fe78b.js" crossorigin="anonymous"></script>
    <!--  fontes  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <!--barra superior con os icones e logo - tipo cabeçalho -->
    <nav>
        <div class="navbar">

            <div class="navEsq">
                <div class="item">
                    <div class="tooltip">Voltar</div>
                    <div class="icon"><a href="login.php"><i class="fa-regular fa-circle-left" alt="Botão Voltar"></i></a></div>
                </div>
                <h1>WeCode</h1>
            </div>

            <div class="navCentro">
                <input type="text" class="pesquisar-box" placeholder="Pesquisar">
            </div>

            <div class="navDir">
                <div class="item">
                    <div class="tooltip"><?php echo $pessoa->getNick(); ?></div>
                    <div class="icon"><?php echo $pessoa->getFoto($pessoa) ?></div>
                    <!-- <img src="img/cheetara.jpg" alt="" /> -->
                </div>
                <div class="item">
                    <div class="tooltip">Home</div>
                    <div class="icon"><a href="index.php"><i class="fa-solid fa-house-chimney" alt="Botão Página Inicial"></i></a></div>
                </div>
                <div class="item">
                    <div class="tooltip">Mensagem</div>
                    <div class="icon"><a href="messenger.php"><i class="fa-regular fa-comments" alt="Botão Mensagem"></i></a></div>
                </div>
                <div class="item">
                    <div class="tooltip">Adicionar</div>
                    <div class="icon"><a href="add.php"><i class="fa-regular fa-square-plus" alt="Botão Adicionar"></i></a></div>
                </div>
                <div class="item">
                    <div class="tooltip">Favoritos</div>
                    <div class="icon"><a href="favoritos.php"><i class="fa-regular fa-heart" alt="Botão Favoritos"></i></a></div>
                </div>
                <div class="item">
                    <div class="tooltip">Sair</div>
                    <!-- <div class="icon"><a href="index.php?acao=sair"><i class="fa-solid fa-right-from-bracket" alt="Botão Sair"></i></a></div> -->
                    <div class="icon"><a href="sair.php" class="icone"><i class="fa-solid fa-right-from-bracket" alt="Botão Sair"></i></a></div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Sessão do Status   -->
    <section class="principal-1">
        <div class="involucro">
            <div class="col-esquerda">
                <div class="status-involucro">
                    <div class="status-card">
                        <div class="perfil-pic"><img src="img/cheetara.jpg" alt="" /></div>
                        <p class="nomeUsuario">Cheetara</p>
                    </div>
                    <div class="status-card">
                        <div class="perfil-pic"><img src="img/aang.jpg" alt="" /></div>
                        <p class="nomeUsuario">Aang</p>
                    </div>
                    <div class="status-card">
                        <div class="perfil-pic"><img src="img/mestre-dos-magos.jpg" alt="" /></div>
                        <p class="nomeUsuario">Mestre_dos_Magos</p>
                    </div>
                    <div class="status-card">
                        <div class="perfil-pic"><img src="img/diana.jpg" alt="" /></div>
                        <p class="nomeUsuario">Diana</p>
                    </div>
                    <div class="status-card">
                        <div class="perfil-pic"><img src="img/Lion-O.png" alt="" /></div>
                        <p class="nomeUsuario">Lion-O</p>
                    </div>
                    <div class="status-card">
                        <div class="perfil-pic"><img src="img/feiticera.jpg" alt="" /></div>
                        <p class="nomeUsuario">Feiticera</p>
                    </div>
                    <div class="status-card">
                        <div class="perfil-pic"><img src="img/jaspion.jpg" alt="" /></div>
                        <p class="nomeUsuario">Jaspion</p>
                    </div>
                    <div class="status-card">
                        <div class="perfil-pic"><img src="img/naruto.jpg" alt="" /></div>
                        <p class="nomeUsuario">Naruto</p>
                    </div>
                </div>
            </div>
    </section>


    <!-- Sessão - Posts da coluna esquerda (coluna-esquerda) -->
    <section class="principal-2">
        <div class="involucro">
            <div class="col-esquerda">
                <div class="nomeuser">
                    <h1>Seja bem-vindo(a)!</h1>
                    <h2><?php echo $pessoa->getNome(); ?></h2>
                </div>
                <div class="publish">
                    <form method="POST" action="index2.php" enctype="multipart/form-data">
                        <br />
                        <textarea placeholder="Escrever uma nova publicação" name="texto"></textarea>
                        <label for="file-input">
                            <div class="icon"><a href="./fotos/"><i class="fa-solid fa-camera" alt="Inserir uma Fotografia"></i></a></div>
                        </label>
                        <input type="submit" value="Publicar" name="publish" />
                        <input type="file" id="file-input" name="file" hidden />
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--  Sessão - Recomendaçoes - (coluna-direita)  -->
    <section class="principal">
        <div class="involucro">
            <div class="col-direita">
                <div class="perfil-ficha">
                    <div class="perfil-pic">
                        <img src="img/profile-pic.jpg" alt="" />
                    </div>
                    <div>
                        <p class="nomeUsuario">Sabedoria_de_Ioda</p>
                        <p class="sub-texto">Rodrigo Cezario</p>
                    </div>
                    <button class="acao-btn">Mudar</button>
                </div>
                <p class="sugestao-texto">Sugestões para você</p>
                <div class="perfil-ficha">
                    <div class="perfil-pic">
                        <img src="img/legopaty2.jpg" alt="" />
                    </div>
                    <div class="nomeuser">
                        <p class="nomeUsuario">Patrícia_Souza</p>
                        <p class="sub-texto">Seguido(a) por Diana</p>
                    </div>
                    <button class="acao-btn">Seguir</button>
                </div>
                <div class="perfil-ficha">
                    <div class="perfil-pic">
                        <img src="img/legodouglas.jpg" alt="" />
                    </div>
                    <div class="nomeuser">
                        <p class="nomeUsuario">Douglas_Fairbanks</p>
                        <p class="sub-texto">Seguido(a) por Jaspion</p>
                    </div>
                    <button class="acao-btn">Seguir</button>
                </div>
                <div class="perfil-ficha">
                    <div class="perfil-pic">
                        <img src="img/legomaikel.jpg" alt="" />
                    </div>
                    <div class="nomeuser">
                        <p class="nomeUsuario">Maikel_Morales</p>
                        <p class="sub-texto">Segue você</p>
                    </div>
                    <button class="acao-btn">Seguir</button>
                </div>
                <div class="perfil-ficha">
                    <div class="perfil-pic">
                        <img src="img/legosav.jpg" alt="" />
                    </div>
                    <div class="nomeuser">
                        <p class="nomeUsuario">Savana_Kurupan</p>
                        <p class="sub-texto">Segue você</p>
                    </div>
                    <button class="acao-btn">Seguir</button>
                </div>
                <div class="perfil-ficha">
                    <div class="perfil-pic">
                        <img src="img/mestre-dos-magos.jpg" alt="" />
                    </div>
                    <div class="nomeuser">
                        <p class="nomeUsuario">Mestre_dos_Magos</p>
                        <p class="sub-texto">Segue você</p>
                    </div>
                    <button class="acao-btn">Seguir</button>
                </div>
            </div>
        </div>
    </section>

</body>

</html>