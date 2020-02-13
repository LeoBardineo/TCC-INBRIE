<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="imagens/IconInbrie.png" type="image" sizes="16x16">
    <link rel="stylesheet" href="styles/styleIndex.css">
    <link rel="stylesheet" href="styles/styleNavBarIndex.css">
    <link rel="stylesheet" href="styles/styleFooterIndex.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="scripts/retiraTransition.js"></script>
    <title>INBRIE - Início</title>
</head>
<body class="preload" id="preloadcontainer">
    <?php
        include('header.php');
    ?>
    <div class="section1">
        <div class="secao1">
            <div class="at-left-section">
                <img src="imagens/logo-inbrie3-icon-trans.png">
            </div>
            <div class="separador-vertical"></div>
            <div class="at-right-section">
                <img src="imagens/inbrie-cortado-trans.png">
                <p>O INBRIE é uma plataforma feita para que artistas do cenário nacional possam compartilhar suas obras, ver criações de outros artistas, e até mesmo entrar em contato com editoras conhecidas do cenário.
                <br><br>
                Registre-se já e revolucione a arte independente no Brasil.</p>
                <a href="registro.php">REGISTRAR</a>
                <div>
                <a class="explore" href="explorar.php">Explorar conteúdo</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section2">
        <div class="section-porque">
            <div class="section-title">
                <h1>Por que usar o INBRIE?</h1>
            </div>
            <div class="separador-horizontal"></div>
            <h2 id="title-card-container">Para os artistas</h2>
            <div id="cardContainer" class="card-container">
                <div class="card first">
                    <img src="imagens/suporte.png">
                    <h2 class="normal-title">Tenha visibilidade em suas obras</h2>
                    <p>Todo projeto que você compartilhar, terá o feedback de outros artistas para o seu crescimento.</p>
                </div>
                <div class="card">
                    <img src="imagens/novos.png">
                    <h2 class="normal-title">Destaque-se como um novo artista</h2>
                    <p>Com o INBRIE, temos o intuito de dar mais visibilidade aos novos artistas, dando espaço para que possam crescer e evoluir.</p>
                </div>
                <div class="card">
                    <img src="imagens/divulgacao.png">
                    <h2 class="last-title">Nós te ajudamos a divulgar</h2>
                    <p>Com sua permissão, podemos ajudar na divulgação, postando as obras nas redes sociais.</p>
                </div>
            </div>
            <h2 id="title-card-container">Para a indústria</h2>
            <div class="card-container">
                <div class="card first">
                    <img class="talento-icon" src="imagens/talentosIcon.png">
                    <h2 class="normal-title">Buque novos talentos</h2>
                    <p>No INBRIE, há artistas talentosos em busca de oportunidades, entre em contato com eles!</p>
                </div>
                <div class="card">
                    <img src="imagens/contatoIcon.png">
                    <h2 class="normal-title">Conheça e contate os artistas facilmente</h2>
                    <p>Na plataforma, você poderá visitar e conhecer o perfil dos artistas que quiser de forma fácil e rápida.</p>
                </div>
                <div class="card">
                    <img src="imagens/filtroIcon.png">
                    <h2 class="normal-title">Filtre os artistas para achar o ideal</h2>
                    <p>Uma vez logado, você poderá filtrar entre a grande quantidade de artistas, para achar o artistas que você quer.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="section-comunidade">
            <div class="section-title">
                <h1>Faça parte da comunidade</h1>
            </div>
            <div class="section-descricao">
                <p>Conecte-se a novos artistas e conheça um novo mundo de oportunidades.<br>
                Registre-se e publique obras nos seguintes segmentos.
            </p>
            </div>
            <div class="separador-horizontal"></div>
            <div class="comunidade-segmentos">
                <div class="row-text">
                    <div class="photo-container">
                        <div class="photo-text alignmiddle">
                            <img src="imagens/iconFoto.png" class="">
                            <h1>Fotografia</h1>
                            <p>Fotos, registros, momentos</p>
                        </div>
                    </div>
                    <div class="music-container">
                        <div class="music-text alignmiddle">
                            <img src="imagens/iconNota.png" class="">
                            <h1>Música</h1>
                            <p>Singles, álbuns, covers</p>
                        </div>
                    </div>
                </div>
                <img class="comunidade-logo" src="imagens/inbrieComunidade.png">
                <div class="row-text">
                    <div class="literatura-container">
                        <div class="literatura-text alignmiddle">
                            <img src="imagens/iconLivro.png" class="">
                            <h1>Literatura</h1>
                            <p>Fanfics, poesias, poemas</p>
                        </div>
                    </div>
                    <div class="ilustracao-container">
                        <div class="ilustracao-text alignmiddle">
                            <img src="imagens/iconPaleta.png" class="">
                            <h1>Ilustração</h1>
                            <p>Desenhos, ilustrações, pinturas</p>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="section-quem-somos">
            <div class="section-title">
                <h1>Quem somos?</h1>
            </div>
            <div class="section-descricao">
                <p>Está é a equipe do INBRIE.</p>
            </div>
            <div class="separador-horizontal"></div>
            <div class="equipe-container">
                <div class="integrante">
                    <img src="imagens/equipeLeobardo.jpg" class="photo-integrante">
                    <h2>Leonardo de Melo</h2>
                    <p>Programador</p>
                </div>
                <div class="integrante">
                    <img src="imagens/equipeLolrenna.jpeg" class="photo-integrante">
                    <h2>Lorenna da Cunha</h2>
                    <p>Programadora</p>
                </div>
                <div class="integrante">
                    <img src="imagens/equipeJuanzito.jpg" class="photo-integrante">
                    <h2>Juan Alves</h2>
                    <p>Designer</p>
                </div>
                <div class="integrante">
                    <img src="imagens/equipeGuiddo.jpeg" class="photo-integrante">
                    <h2>Guilherme Cândido</h2>
                    <p>Social mídia</p>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="section-contato">
            <div class="section-title">
                <h1>Entre em contato</h1>
            </div>
            <div class="section-descricao">
                <p>Envie a mensagem que desejar, aceitamos críticas construtivas, pretendemos sempre melhorar a plataforma!<br>
                Redes sociais: &nbsp;
                <a href="https://www.facebook.com/INBRIEE" target="_blank"><i class="fab fa-facebook-square"></i></a> &nbsp;
                <a href="https://www.instagram.com/in.brie/" target="_blank"><i class="fab fa-instagram"></i></a> &nbsp;
                <a href="https://twitter.com/INBRIE1" target="_blank"><i class="fab fa-twitter"></i></a>
            </p>
            </div>
            <div class="separador-horizontal"></div>
            <div class="container-input-contato">
                <form action="#" method="POST">
                    <input type="text" name="" id="" class="input-text-contato" placeholder="Nome">
                    <input type="email" name="" id="" class="input-text-contato" placeholder="E-mail">
                    <textarea name="" id="" class="input-textarea-contato" placeholder="Sua mensagem"></textarea>
                    <input type="submit" value="ENVIAR" class="input-submit-contato">
                </form>
            </div>
        </div>
    </div>
    <footer class="footerbar">
        <div class="titlefooter">
            <h1>Copyright © 2019 Todos os direitos reservados</h1>
        </div>
        <div class="contentfooter">
            <div class="container-contentfooter">
                <img src="imagens/logo-inbrie4-trans.png">
                <div class="row menu">
                    <h1>Menu</h1>
                    <a href="login.php" target="_blank">- Login</a>
                    <a href="registro.php" target="_blank">- Registrar</a>
                    <a href="explorar.php" target="_blank">- Explorar</a>
                    <a href="pesquisar.php" target="_blank">- Pesquisar</a>
                </div>
                <div class="row socialmedia">
                    <h1>Redes sociais</h1>
                <a href="https://www.facebook.com/INBRIEE" target="_blank"><i class="fab fa-facebook-square"></i></a> &nbsp;
                <a href="https://www.instagram.com/in.brie/" target="_blank"><i class="fab fa-instagram"></i></a> &nbsp;
                <a href="https://twitter.com/INBRIE1" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>