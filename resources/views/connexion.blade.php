<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <title>Connexion</title>
        </head>
        <body>
        <!-- Entête -->
            <nav class="navbar navbar-dark bg-orange" style="background-color: orangered;">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{ route('acceuil') }}"><img src="img/logo_voiturocc.png" height="70" width="100"></a>
                 </div>
              </nav>
              <br>
        <!-- Entête -->
        
        <!-- Formulaire -->
        <div class="login-form">

          @if (session()->has('error'))
          <div class="text text-alert">{{session()->get('error')}}</div>
          @endif
            
            <form action="{{route ('connexion')}}" method="post">

                 @method('post')
                 @csrf


                <h2>Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="email">
                    @error('email')
                    <div class="text text-alert">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                    @error('password')
                    <div class="text text-alert">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <center>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: gray;">Connexion</button>
                </div> 
            </center>  
            </form>
            <p class="text-center">Vous n'avez pas de compte ?<a href="{{ route('registration') }}" style="color: white">Inscrivez-vous</a></p>
        </div>
         <!-- Formulaire -->

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
            .login-form {
                width: 500px;
                margin: 50px auto;
                background-color: orangered;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
                background-color: orangered;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
            .pieds-page{
                background-color: orangered;
            }
        </style>
        </body>
</html>