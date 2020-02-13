<nav class="navbar">
    <ul class="nav-list">
        <div class="at-left">
            <li class="nav-item">
                <a href="index.php"><img src="imagens/logo-inbrie3-icon-trans.png" class="logo-item"></a>
            </li>
            <li class="nav-item"><a href="explorar.php">Explorar</a></li>
            <div class="separador-nav"></div>
        </div>
        <div class="search-bar">
            <li class="nav-item">
            <form method="GET" action="pesquisar.php" class="nav-item">
                <input type="search" class="search-navbar" name="searchTag" id="searchTag" placeholder="Pesquisar...">
                <input type="hidden" name="organizeExplore" id="organizeExplore" value="MaisRecentes">
                <input type="hidden" name="showExplore" id="showExplore" value="ilustracao">
                <div class="container-subnavbar">
                    <input type="submit" value="" class="sub-navbar">
                    <i class='fas fa-search'></i>
                </div>
            </form>
            </li>
        </div>
        <?php
        if(isset($_SESSION['usuarioID'])){
            $usuarioID = $_SESSION['usuarioID'];
    echo"<div class='at-right'>
                <div class='separador-nav'></div>
                <li class='nav-item'>
                    <div class='dropdown'>
                        <div class='dropdown-text'>
                            Publicar<i class='fas fa-angle-down'></i>
                        </div>
                        <div class='dropdown-content'>
                            <a class='pub-link' href='postarIlustracao.php'><i class='fas fa-pencil-ruler'></i><span>Ilustração</span></a>
                            <a class='pub-link' href='postarLiteratura.php'><i class='fas fa-book'></i>Literatura</a>
                            <a class='pub-link' href='postarFotografia.php'><i class='fas fa-camera'></i>Fotografia</a>
                            <a class='pub-link' href='postarMusica.php'><i class='fas fa-music'></i>Música</a>
                        </div>
                    </div>
                </li>
                <li class='nav-item'>
                    <div class='dropdown'>
                        <div class='dropdown-text'>
                            Perfil<i class='fas fa-angle-down'></i>
                        </div>
                        <div class='dropdown-content'>
                            <a class='perfil-link' href='perfil.php?usuarioID=$usuarioID'><i class='fas fa-user'></i><span>Meu perfil</span></a>
                            <a class='perfil-link' href='zActionsPHP/logoutAction.php'><i class='fas fa-sign-out-alt'></i><span>Logout</span></a>
                        </div>
                    </div>
                </li>
            </div>";
        }else{
            echo "
            <div class='at-right'>
            <div class='separador-nav'></div>
                <li class='nav-item'>
                    <a href='login.php'>Logar</a>
                </li>
                <li class='nav-item'>ou</li>
                <li class='nav-item'>
                    <a href='registro.php'>Registrar</a>
                </li>
            </div>
            ";
        }
        ?>
    </ul>
</nav>