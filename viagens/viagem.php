<?php
    $cidades = require "dados_cidades.php";

    $pesquisa = $_GET["pesquisa"]?? null;
    $categoria = $_GET["categoria"] ?? null;

    $filtroCategoria = function($cidade) use($categoria){
        return $cidade["categoria"] == $categoria;
    };
    
    $filtroPesquisa = function($cidade) use($pesquisa){
            
            $titulo = strtolower($cidade["titulo"]);
            $pesquisa = strtolower($pesquisa);
           
            $pos = mb_strpos($titulo,$pesquisa);
           return $pos !== false ? true : false;
    };

    if($categoria){
       
        $cidades = array_filter($cidades,$filtroCategoria);
    }
    if($pesquisa){
        
        $cidades = array_filter($cidades,$filtroPesquisa);
    }
        
        $ordenacao = function($a,$b){
            $tituloA = $a["titulo"];
            $tituloB = $b["titulo"];
        
            return strnatcasecmp($tituloA,$tituloB);
        };
        
        uasort($cidades,$ordenacao);
        $imprimeCard = function($cidade){
            
            extract($cidade);
            require "card_cidades.php";
        }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coldplay Musics</title>
    <link href="viagem.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <header>
    <nav class="menu">
                  <div id="logo1">
                    <img src="imagem/logo.gif" alt="Logo">
                  </div>
                    <ul>
                    <li><a href="../index.html"><strong>Início</strong></a></li>
                    <li><a href="../sobre_nos/sobre.html"><strong>Sobre</strong></a></li>
                    <li><a href="../login.html"><p><strong>Trabalhe Conosco</strong></p></a></li>
                    </ul>
    </nav> 
        <h1><a href="viagem.php">VAI P'RONDE?</a></h1>

       
            <form action="viagem.php" method="get" class="pesquisa">
                <input type="search" name="pesquisa" placeholder="Pesquise aqui a cidade desejada" value="<?=$pesquisa?>">
                <button><svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"> <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" fill="white"></path> </svg></button>
            </form>
       
    </header>
    <main>
    <aside>
        <h2>Cidades</h2>
        <ul>
            <li><a href="viagem.php?categoria=guanambi">Guanambi</a></li>
            <li><a href="viagem.php?categoria=brumado">Brumado</a></li>
            <li><a href="viagem.php?categoria=ilheus">Ilhéus</a></li>
            <li><a href="viagem.php?categoria=porto seguro">Porto Seguro</a></li>
            <li><a href="viagem.php?categoria=salvador">Salvador</a></li>
            <li><a href="viagem.php?categoria=lapa">Bom Jesus Da Lapa</a></li>
            <li><a href="viagem.php?categoria=feira">Feira de Santana</a></li>
            <li><a href="viagem.php?categoria=conquista">Vitória Da Conquista</a></li>
            <li><a href="viagem.php?categoria=itabuna">Itabuna</a></li>
            <li><a href="viagem.php?categoria=camacari">Camaçari</a></li>
            <li><a href="viagem.php?categoria=juazeiro">Juazeiro</a></li>
            <li><a href="viagem.php?categoria=eunapolis">Eunápolis</a></li>
            <li><a href="viagem.php?categoria=lauro">Lauro de Freitas</a></li>
            <li><a href="viagem.php?categoria=barreiras">Barreiras</a></li>
            <li><a href="viagem.php?categoria=texeira">Teixeira de Freitas</a></li>
            <li><a href="viagem.php?categoria=jequie">Jequié</a></li>
            <li><a href="viagem.php?categoria=alagoinhas">Alagoinhas</a></li>
            <li><a href="viagem.php?categoria=simoes">Simões Filho</a></li>
            <li><a href="viagem.php?categoria=paulo">Paulo Afonso</a></li>
            <li><a href="viagem.php?categoria=valenca">Valença</a></li>
            <li><a href="viagem.php?categoria=candeias">Candeias</a></li>
            <li><a href="viagem.php?categoria=jacobina">Jacobina</a></li>
            <li><a href="viagem.php?categoria=santo amaro">Santo Amaro</a></li>
            <li><a href="viagem.php?categoria=bonfim">Senhor do Bonfim</a></li>
            <li><a href="viagem.php?categoria=formoso">Campo Formoso</a></li>
            <li><a href="viagem.php?categoria=itapetinga">Itapetinga</a></li>
            <li><a href="viagem.php?categoria=macaubas">Macaúbas</a></li>
        </ul>
    </aside>
   <section class="cidades">
     <h2>Todas as cidades(A-Z)</h2>
     <section class="cards-cidades">
        <?php 
        #Passa por todos os elementos do array passando um de cada vez para a função definida
        array_walk($cidades,$imprimeCard);
        ?>

     </section>   
    </main>
    <footer>
              <div class="footer-list">
                  <h3>VPO</h3>
                  <ul>
                      <li>ATENDIMENTO</li>
                      <li>QUEM SOMOS</li>
                      <li>TRABALHE CONOSCO</li>
                      <li>SEGURANÇA</li>
                  </ul>
              </div>
              <div class="footer-list">
                  <h3>Grupo Big Six</h3>
                  <ul>
                      <li>LIDERANÇA</li>
                      <li>LOGISTICA</li>
                      <li>NOSSO PODCAST</li>
                  </ul>
              </div>
              <div class="footer-list">
                  <h3>Políticas Legais</h3>
                  <ul>
                      <li>POLITICAS DE SEGURANÇA</li>
                      <li>TERMOS E CONDIÇÕES</li>
                      <li>PRAZOS E DATAS</li>
                  </ul>
              </div>
              <div id="reservado">
                <h1>© Todos os direitos reservados - Vai Pr'Onde</h1>
              </div>
          </footer>

          <style>
            .footer-list {
                display: inline-block;
                width: 30%;
                margin-right: 20px;
                vertical-align: top;
                font-family: Arial, Helvetica, sans-serif;
            }
     .footer-list ul {
        line-height: 2.5; 
    }
            
        </style>
        </div>
</body>
</html>