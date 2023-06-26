<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<head>
    <title>Voiturocc</title>
</head>
<body class="container-fluid">

  <nav class="navbar navbar-dark bg-orange" style="background-color: orangered;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route ('acceuil')}}"><img src="img/logo_voiturocc.png" height="70" width="100"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><b>VOITUROCC</b></h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              @guest
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{ route('registration') }}"><b>INSCRIPTION</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('connexion') }}"><b>CONNEXION</b></a>
                </li>
                @endguest
               @auth
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="/home"><b>ESPACE PERSONNEL</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('deconnexion') }}"><b>DECONNEXION</b></a>
                </li>
               @endauth
               
                
                
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <div class="container-fluid"> 
        <div class="img-voiturocc"></div>
      </div>
      @guest
      <br>
      <br>
      <center><h3>Si vous souhaitez vous aussi soumettre votre parc automobile ? <b><u><a href="{{ route('registration') }}">Créez un compte</a></u></b></h3></center>
      <br>
      @endguest
      <br>

                   @if (session()->has('sucess'))
                  <div class="alert alert-info" role="alert"><b>{{session()->get('sucess')}}</b></div>
                   @endif
      <br>
      @auth
      <div class="container">
        <button type="button" class="btn btn-lg" style="background-color: orangered;"><a href="{{ route('annonces') }}"><b>SOUMETTRE MA VOITURE</b></a></button>
      </div>
      <br>
      <center><p><h1>Bonjour {{ Auth::user()->username }} <h/1></p>  </center>
      <br>
      <br>
      @endauth
      <div class="recherche">
      <br>
      <br>
      <br>
        <center>
        <h1>Bienvenue sur <b>Voiturocc</b></h1>
        <h2><i>Louer une voiture en un clic ...</i></h2>
      <br>
      <form action="{{route ('acceuil')}}" method="get">

                 @method('get')
                 @csrf
        <input class="form-control form-control-lg" type="text" name="recherche" placeholder="Entrez une marque de voiture" aria-label=".form-control-lg example" style="width: 500px;" value="{{ request()->get('recherche')}}">
        <br>
        <button type="submit" class="btn" style="background-color: white;">Recherchez</button>

</form>
      </center>
      </div>
      <br>
      
      <div class="container">
        <div class="products">
          <div class="container">
              <div class="row card-deck">
              @foreach ($AnnoncesListes as $AnnoncesListe)
                  <div class="col-lg-4">
                    <div class="card">
                      <img src="img/logo.jpg" class="card-img-top" alt="image-annonce" height="355">
                      <div class="card-body">
                        <h5 class="card-title">{{ $AnnoncesListe -> Marque }}</h5>
                        <p class="card-text">Immatriculation: {{ $AnnoncesListe -> Immatriculation }}<br> Marque: {{ $AnnoncesListe -> Marque }}<br> Tarifs: {{ $AnnoncesListe -> Tarifs}}.</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                          @guest
                           <a href="{{route ('commande')}}"><button type="button" class="btn btn-sm" >Commandez</button></a> 
                           <br>
                           @endguest
                          </div>
                          <div>
                           @auth
                           @if (Auth::user()->id === $AnnoncesListe->user_id) 
                           <a href="modifier/{{ $AnnoncesListe -> id }}"><button type="button" class="btn btn-sm">Modifier</button></a> 

                           <form action="delete/{{ $AnnoncesListe -> id }}" method="post">
                                  @method('DELETE')
                                  @csrf
                           <a href=""><button type="submit" class="btn btn-sm">Supprimer</button></a> 
                           </form>
                           @endif
                           @endauth
                          </div>
                          <span class="price">{{ $AnnoncesListe -> Tarifs }} Fcfa</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
               </div>
            </div>
        </div>
        <br>
        <br>
       <div style="margin-right: 50%; margin-left: 50%;">{{ $AnnoncesListes->links()}}</div>
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
</body>

<style>
  .img-voiturocc{
       
       height: 800px;
       width: 100%;
       background-image:url("img/acceuil-voiturocc.png") ;
       background-size: cover ;
       
   }
   .recherche{
       height: 400px;
       width: 100%;
       background-color:orangered;
   }
       .recherche h1{
    color:white;
   }
       .recherche h2{
    color:white;
   }
  
   .products {
	padding: 5% 0 0;
} 
.card {
    border: none;
	  box-shadow: 0 2px 20px rgba(7, 156, 64, 0.945);
}
  
.pieds-page{
  background-color: orangered;
}

a{
  text-decoration: none;
  color: black;
}
</style>
</html>