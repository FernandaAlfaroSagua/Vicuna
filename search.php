<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Fernanda Alfaro - Mitzy Flores - Paola Pinnola - Vesna Marin" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vicuña</title>
    <link rel="shortcut icon" type="image/ico" href="./img/logo.ico" />

    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    /> 
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./owl/owl.carousel.min.css">
    <link rel="stylesheet" href="./owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="./index.php"><img src="img/Logotipo.png"
            width="150"
            class="d-inline-block align-top"
            alt="">
      </a>
      <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarCollapse"
          aria-controls="navbarCollapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="index.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="index.php?#historia">Historia
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="index.php?#location">Puntos de Interes
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="index.php?#services">Servicios
            </a>
          </li>
        </ul>
        <ul class="list-inline ml-auto mr-4" id="social">
          <li class="list-inline-item">
            <a href="https://www.youtube.com/channel/UCp3pridu6YCWod4oazXTucw" target="_blank" >
            <img src="./img/ico_youtube_gris.png" alt="" >
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://www.facebook.com/turismovicuna/" target="_blank" >
            <img src="./img/ico_facebook_gris.png" alt="">
            </a> 
          </li>
          <li class="list-inline-item">
            <a href="https://www.instagram.com/vicunaturismo/" target="_blank" >
            <img src="./img/ico_instagram_gris.png" alt="" >

            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://twitter.com/vicunaturismo?lang=es" target="_blank" >
            <img src="./img/ico_twitter_gris.png" alt="" >
            </a>
          </li>
        </ul>
        <form class="form-inline d-flex flex-nowrap align-items-center ml-lg-2 ml-sm-0 mb-4 "  action="./function/ctrl_search.php" method="post">
            <input class="form-control form-control-sm mt-1" required name="search" type="text" placeholder="Ej Iglesía">
            <button class="btn btn-danger btn-sm mx-1" type="submit">Buscar</button>
        </form>
      </div>
      <div class="barra-primera">
          <img src="./img/barra.png" >
        </div>
    </nav>
    </header>
    <main role="main">
    <div class="container" id="busqueda">
        
    </div>
      <!-- Footer -->
<footer class="page-footer font-small blue pt-5">
  <!-- Footer Links -->
  <div class="container-fluid">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-2 mt-md-0 my-3 text-center">
        <!-- Content -->
        <img src="img/Isotipo-white.png" width="100" alt="Logo Vicuña" class="mt-2">

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-7 mb-md-0 my-auto">

        <!-- Links -->
        <ul class="list-unstyled text-center">
          <li>
            &copy; 2020 Vicuña Valle del Elqui. Corporación Municipal de Turismo de Vicuña
          </li>
          <li>
            Teléfonos: +56 9 52367203 - +56 9 52367202 - +59 9 42262943
          </li>
          <li>
            Oficinas: Ruta 41 km 63. Parque Los Pimientos.
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 text-center my-auto">
        <a href="https://www.youtube.com/channel/UCp3pridu6YCWod4oazXTucw" target="_blank" class="mr-2" >
           <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="10mm" height="10mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 164 164"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <style type="text/css">
                <![CDATA[
                  .str0 {stroke:#FEFEFE;stroke-width:6.20082}
                  .fil0 {fill:none}
                  .fil1 {fill:#FEFEFE}
                ]]>
                </style>
              </defs>
              <g id="Capa_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <path class="fil0 str0" d="M82 160l0 0c-44,0 -79,-35 -79,-78l0 0c0,-44 35,-79 79,-79l0 0c43,0 78,35 78,79l0 0c0,43 -35,78 -78,78z"/>
                <path class="fil1" d="M142 51c-1,-5 -6,-9 -11,-11 -10,-3 -49,-3 -49,-3 0,0 -40,0 -49,3 -6,2 -10,6 -12,11 -2,10 -2,31 -2,31 0,0 0,20 2,30 2,6 6,10 12,11 9,3 49,3 49,3 0,0 39,0 49,-3 5,-1 10,-5 11,-11 3,-10 3,-30 3,-30 0,0 0,-21 -3,-31zm-73 50l0 -38 33 19 -33 19z"/>
              </g>
              </svg>
            </a>

        <a href="https://www.facebook.com/turismovicuna/" target="_blank" class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="10mm" height="10mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 133 133"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <style type="text/css">
                <![CDATA[
                  .str0 {stroke:#FEFEFE;stroke-width:5.04267}
                  .fil0 {fill:none}
                  .fil1 {fill:#FEFEFE}
                ]]>
                </style>
              </defs>
              <g id="Capa_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <path class="fil0 str0" d="M67 130l0 0c-36,0 -64,-28 -64,-63l0 0c0,-36 28,-64 64,-64l0 0c35,0 63,28 63,64l0 0c0,35 -28,63 -63,63z"/>
                <path class="fil1 str1" d="M57 105l15 0 0 -39 11 0 1 -13 -12 0c0,0 0,-5 0,-7 0,-3 1,-5 4,-5 2,0 8,0 8,0l0 -13c0,0 -9,0 -10,0 -12,0 -17,5 -17,15 0,8 0,10 0,10l-8 0 0 13 8 0 0 39z"/>
              </g>
              </svg>
            </a> 

        <a href="https://www.instagram.com/vicunaturismo/" target="_blank" class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="10mm" height="10mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 105 105"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <style type="text/css">
                <![CDATA[
                  .str0 {stroke:#FEFEFE;stroke-width:3.97517}
                  .fil0 {fill:none}
                  .fil1 {fill:#FEFEFE}
                ]]>
                </style>
              </defs>
              <g id="Capa_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <path class="fil0 str0" d="M52 103l0 0c-27,0 -50,-23 -50,-51l0 0c0,-27 23,-50 50,-50l0 0c28,0 51,23 51,50l0 0c0,28 -23,51 -51,51z"/>
                <path class="fil1" d="M52 25c-7,0 -8,0 -11,0 -3,0 -5,1 -7,1 -2,1 -3,2 -5,3 -1,2 -2,3 -3,5 0,2 -1,4 -1,7 0,3 0,4 0,11 0,8 0,9 0,12 0,3 1,5 1,7 1,1 2,3 3,4 2,2 3,3 5,4 2,0 4,1 7,1 3,0 4,0 11,0 8,0 9,0 12,0 3,0 5,-1 7,-1 1,-1 3,-2 4,-4 2,-1 3,-3 4,-4 0,-2 1,-4 1,-7 0,-3 0,-4 0,-12 0,-7 0,-8 0,-11 0,-3 -1,-5 -1,-7 -1,-2 -2,-3 -4,-5 -1,-1 -3,-2 -4,-3 -2,0 -4,-1 -7,-1 -3,0 -4,0 -12,0zm0 5c8,0 9,0 12,0 2,0 4,0 5,1 1,0 2,1 3,2 1,1 1,2 2,3 0,1 1,3 1,5 0,3 0,4 0,11 0,8 0,9 0,12 0,2 -1,4 -1,5 -1,1 -1,2 -2,3 -1,1 -2,1 -3,2 -1,0 -3,1 -5,1 -3,0 -4,0 -12,0 -7,0 -8,0 -11,0 -2,0 -4,-1 -5,-1 -1,-1 -2,-1 -3,-2 -1,-1 -2,-2 -2,-3 -1,-1 -1,-3 -1,-5 0,-3 0,-4 0,-12 0,-7 0,-8 0,-11 0,-2 0,-4 1,-5 0,-1 1,-2 2,-3 1,-1 2,-2 3,-2 1,-1 3,-1 5,-1 3,0 4,0 11,0z"/>
                <path class="fil1" d="M52 62c-5,0 -9,-4 -9,-10 0,-5 4,-9 9,-9 6,0 10,4 10,9 0,6 -4,10 -10,10zm0 -24c-7,0 -14,7 -14,14 0,8 7,15 14,15 8,0 15,-7 15,-15 0,-7 -7,-14 -15,-14z"/>
                <path class="fil1" d="M71 38c0,1 -2,3 -4,3 -2,0 -3,-2 -3,-3 0,-2 1,-4 3,-4 2,0 4,2 4,4z"/>
              </g>
              </svg>
            </a>

        <a href="https://twitter.com/vicunaturismo?lang=es" target="_blank" >
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="10mm" height="10mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 87 87"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <style type="text/css">
                <![CDATA[
                  .str0 {stroke:#FEFEFE;stroke-width:3.31506}
                  .fil0 {fill:none}
                  .fil1 {fill:#FEFEFE}
                ]]>
                </style>
              </defs>
              <g id="Capa_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <path class="fil0 str0" d="M44 86l0 0c-24,0 -42,-19 -42,-42l0 0c0,-24 18,-42 42,-42l0 0c23,0 42,18 42,42l0 0c0,23 -19,42 -42,42z"/>
                <path class="fil1" d="M21 58c4,2 9,4 14,4 17,0 27,-14 27,-27 1,-2 3,-3 4,-5 -2,1 -3,1 -5,1 2,-1 3,-3 4,-5 -2,1 -4,2 -6,2 -2,-1 -4,-2 -7,-2 -6,0 -10,5 -9,11 -7,-1 -14,-4 -19,-10 -2,4 -1,10 3,12 -1,0 -3,0 -4,-1 0,5 3,9 7,9 -1,1 -2,1 -4,1 2,3 5,6 9,6 -4,3 -9,4 -14,4z"/>
              </g>
              </svg>

            </a>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->
  <hr class="w-100 bg-white"/>

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Sitio desarrollado por Área de Tecnologías de Información y Ciberseguridad 2021 
  </div>
  <!-- Copyright -->
  <div class="barra-segunda bg-white">
          <img src="./img/barra2.png" >
  </div>
</footer>
<!-- Footer -->
    </main> 
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src="./js/busqueda.js"></script>
  </body>
</html>
