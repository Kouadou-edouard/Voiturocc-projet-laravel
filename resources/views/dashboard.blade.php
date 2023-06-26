<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<head>
    <title>Espace personnel</title>
</head>
<body class="container-fluid">

   <!------------------ Entête ------------>
  <nav class="navbar navbar-dark bg-orange " style="background-color: orangered;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('acceuil') }}"><img src="img/logo_voiturocc.png" height="70" width="100"></a>
              <div class="col-2">                                            
                  <a class="nav-link" href="{{ route('deconnexion') }}"><b><h5>DECONNEXION</h5></b></a>              
              </div>
            </div>
      </nav>
  <!------------------ Entête ------------>
  
  <!------------------ profil ------------>

<div class="section-profil">
  
    <br>
    <br>
    <div id="profil">
        
        <img src="img/avatar.png" class="myphoto">
        <br>
        <p>Bonjour et bienvenue <h1> {{ Auth::user()->username }} <h/1></p>

    </div>
</div>

  <!------------------ profil ------------>
  
  <!------------------ Tableau de bord ------------>
<div id="Box">
  <div id="tableau-bord">
    <h1><b><i>Vos annonces</i></b></h1>
    <br>
    <br>
    <button type="button" class="btn btn-lg" style="background-color: orangered; width: 300px;"><a href="{{ route('annonces') }}">CREER UNE ANNONCE</a></button>
    <br>
    <br>
    <br>
    @foreach ($AnnoncesListes as $AnnoncesListe)
    @if (Auth::user()->id === $AnnoncesListe->user_id)
    <table width="100%" border="1">
        <tr>
            <th>IMMATRICULATION</th>
            <th>MARQUE</th>
            <th>TARIFS</th>
            <th>PHOTO</th>
            <th>SUPPRIMER</th>
            <th>MODIFIER</th>
        </tr>

        <tr>
        

            <th>{{ $AnnoncesListe -> Immatriculation }}</th>
            <th>{{ $AnnoncesListe -> Marque }}</th>
            <th>{{ $AnnoncesListe -> Tarifs }}</th>
            <th><img src="img/logo.jpg" class="photo-voiture"></th>
            <form action="delete/{{ $AnnoncesListe -> id }}" method="post">
                                  @method('DELETE')
                                  @csrf
            <th><a href=""><button type="submit" style="background-color: orangered;"><img src="img/supprimer.png"  width="50" height="50"></button></a></th>
            </form>
            <th><a href="modifier/{{ $AnnoncesListe -> id }}"><img src="img/modifier.png" width="50" height="50"></a></th>
        </tr>
        @endif
       @endforeach
    </table>

  </div>
</div>
  <!------------------ Tableau de bord ------------>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

      <section class="pieds-page">
        <!-- Footer -->
        <footer class="pieds-page">
          <!-- Grid container -->
          <div class="container p-4">
            <!--Grid row-->
            <div class="row">
              <!--Grid column-->
              <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase"><b>Voiturocc</b></h5>
      
                <p>
                Voiturocc est une plateforme de location de voiture pour occasion
                et de mise en location de voiture pour ceux qui souhaitent rentabiliser leur parc automobile!
                </p>
              </div>
              <!--Grid column-->
            </div>
            <!--Grid row-->
          </div>
          <!-- Grid container -->
      
          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </section>

      <style>
        .section-profil{
                width: 100%;
                height: 300px;
                background-color: #51af03a2;
            }
       .myphoto{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 1 px solid;
        } 
        #profil{
            width: 20%;
            padding: 10px;
           
            text-align: center;
            min-height: 100px;
            
            border: 1 px solid #f1f1f1;
            background: #fff;

            box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.25);

            margin-right: auto;
            margin-left: auto;

            background-color: gray;
        }

        #Box{
            width: 100%;
            padding: 5px;
            margin: 10px;
        }

        #Box #tableau-bord{
            box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.25);
            min-height: 100px;
            border: 1 px solid #f1f1f1;
            background: #fff;

            width: 97%;
            padding: 20px;
            margin: 5px;
        }
        a{
            text-decoration: none;
            color:black;
        }

        table{
            caption-side: bottom;
        }
        th,td{
            border: none;
            padding: 10px;
        }

        th{
            border: none;
            background-color: lightgray;
            padding: 10px;
        }
        .photo-voiture{
            width: 130px;
            height: 100px;
            border-radius: 10%;
            border: 1px solid;
        }
        .pieds-page{
                background-color: orangered;
            }       
      </style>
    </body>