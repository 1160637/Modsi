<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Vollkorn:400,400i,600,700,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="main_styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <title> Pior Agência de Viagens</title>
</head>

<body>
  <div class="container">
    <!-- Header -->
    <header id="topico1" class="header center">
      <!--navbar-->
      <div class="navbar-wrapper">
        <nav class="navbar">
          <div class="navbar-logo">
            <h1>
              <span class="center">P</span>
              <span class="center">A</span>
              <span class="center">V</span>
              <span class="center">P</span>
              <span class="center">T</span>
            </h1>
          </div>
          <ul class="nav-list">
          <li class="nav-list-item dropdown-hover">
              <a href="#" class="nav-list-link">Cliente <i class="fas fa-chevron-down"></i></a>
              <ul class="nav-dropdown">
                <li class="nav-dropdown-item">
                  <a href="Pacotes.html" class="nav-dropdown-link-1">Pacotes</a>
                  <a href="Pacotes.html" class="nav-dropdown-link-2">Combinação de voo e hotel num
                    pacote em
                    promoção</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="Cruzeiros.html" class="nav-dropdown-link-1">Cruzeiros</a>
                  <a href="Cruzeiros.html" class="nav-dropdown-link-2">Uma viagem relaxante por um
                    cruzeiro</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="Hoteis.html" class="nav-dropdown-link-1">Hotéis</a>
                  <a href="Hoteis.html" class="nav-dropdown-link-2">A hospedagem ideal para a sua
                    viagem</a>
                </li>
              </ul>
            </li>
            <li class="nav-list-item dropdown-hover">
              <a href="#" class="nav-list-link">Consulta<i class="fas fa-chevron-down"></i></a>
              <ul class="nav-dropdown">
                <li class=" nav-dropdown-item">
                  <a href="reservas.html" class="nav-dropdown-link-1">Reservas</a>
                  <a href="reservas.html" class="nav-dropdown-link-2">Dados sobre as reservas
                    efetuadas</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="Dados_pessoas/dados_pessoais.php" class="nav-dropdown-link-1">Dados Pessoais</a>
                  <a href="Dados_pessoas/dados_pessoais.php" class="nav-dropdown-link-2">Lista dos dados pessoais</a>
                </li>
              </ul>
            </li>
            <?php
              //PHP implementação da condição que imprime campos de gestão 
              // baseado na role do utilizador que faz login através da var $_SESSION['role']
              session_start();
              $role = $_SESSION['role'];
              $logging = $_SESSION['logged'];
              if($role == 'admin' || $role == 'gestor de reservas' || $role == 'diretor' ){
            ?>
              <li class="nav-list-item dropdown-hover">
              <a href="#" class="nav-list-link">Gestão<i class="fas fa-chevron-down"></i></a>
              <ul class="nav-dropdown">
                <li class=" nav-dropdown-item">
                  <?php
                    session_start();
                    if ($role == 'gestor de reservas'){
                  ?>
                  <a href="./Reservas/gestor_reservas.php" class="nav-dropdown-link-1">Gerir Reservas</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="#" class="nav-dropdown-link-1">Gerir Pensões</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="#" class="nav-dropdown-link-1">Gerir Vagas</a>
                </li>
                <?php
                    }
                    elseif($role == 'admin'){
                ?>
                <li class="nav-dropdown-item">
                  <a href="./Admin/admin.html" class="nav-dropdown-link-1">Alterar Roles</a>
                </li>
                <?php
                  }
                  elseif($role == 'diretor'){
                ?>
                <li class="nav-dropdown-item">
                  <a href="./Diretor_Empresa/diretor_empresa.html" class="nav-dropdown-link-1">Gerir Vagas</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="./Diretor_Empresa/diretor_empresa.html" class="nav-dropdown-link-1">Gerir Voos</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="./Diretor_Empresa/diretor_empresa.html" class="nav-dropdown-link-1">Gerir Cruzeiros</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="./Diretor_Empresa/diretor_empresa.html" class="nav-dropdown-link-1">Hotéis</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="./Diretor_Empresa/diretor_empresa.html" class="nav-dropdown-link-1">Finanças</a>
                </li>
                <li class="nav-dropdown-item">
                  <a href="./Diretor_Empresa/diretor_empresa.html" class="nav-dropdown-link-1">Funcionários</a>
                </li>
                <?php
                  }
                ?>
              </ul>
              </li>
            <?php
              }
            ?>
          </ul>
          <div class="navbar-buttons">
            <?php
              //PHP code que retira ou implementa os botões de login e signup
              // a var $_SESSION['logged'] têm o valor que permite implementar a condição
              session_start();
              $logging = $_SESSION['logged'];
              if($logging == false){
            ?>
            <a href="./LogIn_Page/new_login.html">
            <button class="navbar-btn login-btn">Login</button>
            </a>
            <a href="./Create_Account/Create_Account.html">
            <button class="navbar-btn signup-btn">Signup</button>
            </a>
            <?php
              }
              else {
            ?>
            <a href="./main.php">
            <button class="navbar-btn login-btn">Logout</button>
            </a>
            <?php
              $_SESSION['logged'] = false;
              $_SESSION['role'] = Null;
              }
              ?>
          </div>
        </nav>
      </div>
      <!--Fim da navbar-->
      <div class="header-text">
        <div class="heading">Pior Agência de Viagens</div>
        <p class="header-paragraph">Pacotes de viagens com estadia, Hotéis e Cruzeiros</p>
      </div>
    </header>
    <!-- Secção1 -->
    <section class="section-1">
      <h1 class="section-1-heading">Os nossos serviços</h1>
      <div class="services">
        <div class="service">
          <i class="fa-solid fa-plane"></i>
          <h3 class="service-heading">Pacotes
          </h3>
          <p class="service-paragraph">Pacotes de viagens com estadia incluída</p>
        </div>
        <div class="services">
          <div class="service">
            <i class="fa-solid fa-ship"></i>
            <h3 class="service-heading">Cruzeiros
            </h3>
            <p class="service-paragraph">Diferentes tipos de cruzeiro pelo mundo</p>
          </div>
          <div class="services">
            <div class="service">
              <i class="fa-solid fa-hotel"></i>
              <h3 class="service-heading">Hotéis
              </h3>
              <p class="service-paragraph"> Hotéis preparados para a sua estadia</p>
            </div>
          </div>
    </section>
    <!-- Fim da Secção1 -->
    <!-- End of header -->
    <!--Sugestoes-->
    <section id="topico2" class="sugestoes">
      <div class="img-container">
        <img src="images/maldives-tropical-beach-resort-wallpaper.jpg" class="bg-img">
        </img>
      </div>
      <div class="sugestoes-heading-1">
        <h1 class="sugestoes-title">Sugestoes</h1>
        <div class="story-bg">
          <div class="story">
            <img src="images/Malta.png" alt="Customer_image" class="story-image">
            <div class="story-text">
              <h1 class="story-heading">Malta</h1>
              <p class="story-paragraph"> Em seus pouco mais de 300 quilômetros quadrados, você encontrará
                praias, festa e uma atmosfera jovem, templos megalíticos, cavernas marinhas e muitas
                outras atrações turísticas.</p>
            </div>
          </div>
        </div>
        <div class="story-bg">
          <div class="story">
            <img src="images/Açores.png" alt="Customer_image" class="story-image">
            <div class="story-text">
              <h1 class="story-heading">Açores - Portugal</h1>
              <p class="story-paragraph"> Os Açores são famosos por suas paisagens vulcânicas
                espetaculares, que incluem crateras, lagoas, montanhas, falésias e planícies costeiras.
                As ilhas são cobertas por uma vegetação exuberante e oferecem uma diversidade única de
                flora e fauna. Hortênsias azuis são comuns e adicionam um toque de cor às paisagens
                verdes.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Fim de Sugestoes-->
    <!-- Produtos Pacotes -->
    <section id="topico3" class="products">
      <div class="products-topico">
        <h1 class="products-heading">Pacotes</h1>
        <button class="products-button1"><a class="a-button1" href="#"> Mais Pacotes</a></button>
      </div>
      <div class="card-wrapper">
        <div class="card">
          <div class="front-side">
            <img src="images/maldives-tropical-beach-resort-wallpaper.jpg" alt="#" class="card-image">
            <h1 class="card-name"> Pacote - Malta + 5 dias</h1>
            <ul class="card-list">
              <li class="card-list-item"> Partida From Portugal</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">
              <?php
                //Chamada da função que vai buscar o preço do pacote e imprime na pagina
                include "database_tools/funcs.php";
                $price = getPacotePrice('Malta');
                echo $price ."€";
              ?>
            </h3>
            <button class="card-button">Reserve agora</button>
          </div>
        </div>
        <div class="card">
          <div class="front-side">
            <img src="images/maldives-tropical-beach-resort-wallpaper.jpg" alt="#" class="card-image">
            <h1 class="card-name"> Pacote - Malta + 5 dias</h1>
            <ul class="card-list">
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">650€
            </h3>
            <button class="card-button">Reserve agora</button>
          </div>
        </div>
        <div class="card">
          <div class="front-side">
            <img src="images/maldives-tropical-beach-resort-wallpaper.jpg" alt="#" class="card-image">
            <h1 class="card-name"> Pacote - Malta + 5 dias</h1>
            <ul class="card-list">
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">650€
            </h3>
            <button class="card-button">Reserve agora</button>
          </div>
        </div>
        <div class="card">
          <div class="front-side">
            <img src="images/maldives-tropical-beach-resort-wallpaper.jpg" alt="#" class="card-image">
            <h1 class="card-name"> Pacote - Malta + 5 dias</h1>
            <ul class="card-list">
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">650€
            </h3>
            <button class="card-button">Reserve agora</button>
          </div>
        </div>
        <div class="card">
          <div class="front-side">
            <img src="images/cruzeiro_3.jpg" alt="#" class="card-image">
            <h1 class="card-name">Pacote - Açores + 3 dias </h1>
            <ul class="card-list">
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">300€
            </h3>
            <button class="card-button">Reserve agora</button>
          </div>
        </div>
        <div class="card">
          <div class="front-side">
            <img src="images/Cruzeiro.jpg" alt="#" class="card-image">
            <h1 class="card-name"> Pacote - Madrid + 7 dias </h1>
            <ul class="card-list">
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">450€
            </h3>
            <button class="card-button">Reserve agora</button>
          </div>
        </div>
      </div>
    </section>
    <!-- Fim Produtos Pacotes-->

    <!-- Produtos Cruzeiros-->
    <section id="topico4" class="products">
      <div class="products-topico">
        <h1 class="products-heading">Cruzeiros</h1>
        <button class="products-button1"><a class="a-button1" href="#"> Mais Cruzeiros</a></button>
      </div>
      <div class="card-wrapper">
        <div class="card">
          <div class="front-side">
            <img src="images/maldives-tropical-beach-resort-wallpaper.jpg" alt="#" class="card-image">
            <h1 class="card-name"> Cruzeiro - Mediterrâneo</h1>
            <ul class="card-list">
              <li class="card-list-item"> Percurso: </li>
              <li class="card-list-item"> Duração: </li>
              <li class="card-list-item"> Data e hora de partida: </li>
              <li class="card-list-item"> Lugares disponíveis: </li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">$399
            </h3>
            <button class="card-button">Buy Now</button>
          </div>
        </div>
        <div class="card">
          <div class="front-side">
            <img src="images/cruzeiro_3.jpg" alt="#" class="card-image">
            <h1 class="card-name">Cruzeiro - Caraíbas </h1>
            <ul class="card-list">
              <li class="card-list-item"> Percurso: </li>
              <li class="card-list-item"> Duração: </li>
              <li class="card-list-item"> Data e hora prevista de partida: </li>
              <li class="card-list-item"> Lugares disponíveis: </li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">$399
            </h3>
            <button class="card-button">Reserve agora</button>
          </div>
        </div>
        <div class="card">
          <div class="front-side">
            <img src="images/Cruzeiro.jpg" alt="#" class="card-image">
            <h1 class="card-name"> Cruzeiro - Pacífico </h1>
            <ul class="card-list">
              <li class="card-list-item"> Percurso: </li>
              <li class="card-list-item"> Duração: </li>
              <li class="card-list-item"> Data e hora prevista de entrada: </li>
              <li class="card-list-item"> Lugares disponíveis: </li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">$399
            </h3>
            <button class="card-button">Reserve agora</button>
          </div>
        </div>
      </div>
    </section>
    <!-- Fim Produto Cruzeiros-->

    <!-- Produtos Hoteis-->
    <section id="topico5" class="products">
      <div class="products-topico">
        <h1 class="products-heading">Hoteis</h1>
        <button class="products-button1"><a class="a-button1" href="#"> Mais Hoteis</a></button>
      </div>
      <div class="card-wrapper">
        <div class="card">
          <div class="front-side">
            <img src="images/maldives-tropical-beach-resort-wallpaper.jpg" alt="#" class="card-image">
            <h1 class="card-name"> Hotel - Madrid </h1>
            <ul class="card-list">
              <li class="card-list-item"> Estadia: </li>
              <li class="card-list-item"> Morada: </li>
              <li class="card-list-item"> Pensão: </li>
              <li class="card-list-item"> Vagas: </li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">$399
            </h3>
            <button class="card-button">Buy Now</button>
          </div>
        </div>
        <div class="card">
          <div class="front-side">
            <img src="images/cruzeiro_3.jpg" alt="#" class="card-image">
            <h1 class="card-name">Cruzeiro Mediterraneo de 14 dias </h1>
            <ul class="card-list">
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">$399
            </h3>
            <button class="card-button">Buy Now</button>
          </div>
        </div>
        <div class="card">
          <div class="front-side">
            <img src="images/Cruzeiro.jpg" alt="#" class="card-image">
            <h1 class="card-name"> Hotel Dubai - 7 dias </h1>
            <ul class="card-list">
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
              <li class="card-list-item">information about it</li>
            </ul>
            <button class="navigation-button">
              price &gt;&gt;
            </button>
          </div>
          <div class="back-side center">
            <button class="navigation-button">
              &lt;&lt; back
            </button>
            <h3 class="package-price">$399
            </h3>
            <button class="card-button">Buy Now</button>
          </div>
        </div>
      </div>
    </section>
    <!-- Fim produtos Hoteis -->
    <!-- Footer -->
    <footer class="footer">
      <div class="footer-list">
        <a href="#topico1" class="footer-link">Home</a>
        <a href="#topico2" class="footer-link">Sugestões</a>
        <a href="#topico3" class="footer-link">Pacotes</a>
        <a href="#topico4" class="footer-link">Cruzeiros</a>
        <a href="#topico5" class="footer-link">Hotéis</a>
        <a href="" class="footer-link">About Us</a>
      </div>
      <p class="footer-paragraph">
        Copyright &copy; PAVPT All Rights Reserved
      </p>
    </footer>
    <!-- End of Footer -->
  </div>
  <script src=" main_script.js">
  </script>
</body>

</html>