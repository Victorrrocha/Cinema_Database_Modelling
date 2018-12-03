<?php 
  include_once ("config.php");
  include_once ("connection.php");
  include_once("functions.php");
  session_start();

  if(!isset($_SESSION['UsuarioLog'])){
    header("Location: index.php");
    session_destroy();
  }

  if(isset($_GET['deslogar']))
  {
    session_destroy();
    header("Location: index.php");
  }


  $mysqli = DBConnect();
  $moviesDB = $mysqli->query("SELECT * FROM filmes");
  
 
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Movies</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            
            
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Cinema Paradiso</strong>
          </a>
          <button> <a href="?deslogar"> Logout </a> </button>
        </div>
      </div>
    </header>

    <main role="main">

      <div class="bill"> <h1>Em cartaz</h1> </div>
      
      <?php 
        while($movie = $moviesDB->fetch_assoc()): ?>
      
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row ">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src='<?= $movie['fil_image']?>' alt="Card image cap">
                <div class="card-body">
                 <?= "<h3>".  $nome = $movie['fil_nome']."</h3>" ?>  
                 <?= "<h5>".  $formato = $movie['fil_formato'] ."</h3>" ?>        
                  <div class="d-flex justify-content-between align-items-center">
                    
                    <small class="text-muted" name="duration"> <?= $duration = $movie['fil_duration']?> </small>
                  </div>

                  <div class="seatStructure txt-center" style="overflow-x:auto;">
                <table id="seatsBlock">
                    <p id="notification"></p>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>2 </td>
                        <td>3 </td>
                        <td>4 </td>
                        <td>5 </td>
                        <td>  </td>
                        <td>6 </td>
                        <td>7 </td>
                        <td>8 </td>
                        <td>9 </td>
                        <td>10</td>
                        
                    </tr>
                    <tr>
                        <td>A</td>
                        <td>
                            <input type="checkbox" class="seats" value="A1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A5">
                        </td>
                        <td class="seatGap"></td>
                        <td>
                            <input type="checkbox" class="seats" value="A6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A10">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>B</td>
                        <td>
                            <input type="checkbox" class="seats" value="B1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="B6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B10">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>C</td>
                        <td>
                            <input type="checkbox" class="seats" value="C1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="C6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C10">
                        </td>
                       
                    </tr>

                    <tr>
                        <td>D</td>
                        <td>
                            <input type="checkbox" class="seats" value="D1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="D6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D10">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>E</td>
                        <td>
                            <input type="checkbox" class="seats" value="E1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="E6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E10">
                        </td>
                       
                    </tr>

                    <tr class="seatVGap"></tr>

                    <tr>
                        <td>F</td>
                        <td>
                            <input type="checkbox" class="seats" value="F1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="F6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F10">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>G</td>
                        <td>
                            <input type="checkbox" class="seats" value="G1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="G6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G10">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>H</td>
                        <td>
                            <input type="checkbox" class="seats" value="H1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="H6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H10">
                        </td>
                       
                    </tr>

                
                </table>

                <div class="screen">
                    <h2 >Tela Aqui</h2>
                </div>
                <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-success"> Comprar </button>
                </div>
            </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>

    <?php endwhile; ?>
    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
