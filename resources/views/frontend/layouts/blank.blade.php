<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dwiggy Do</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <section class="idx-signup">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 bg-login covr-page">
                    <div class="img-dog img1"><img src="{{ asset('frontend/images/img-1.png') }}"></div>
                    <div class="img-dog img2"><img src="{{ asset('frontend/images/img-2.png') }}"></div>
                    <div class="img-dog img3"><img src="{{ asset('frontend/images/img-7.png') }}"></div>
                     <div class="img-dog img4"><img src="{{ asset('frontend/images/img-4.png') }}"></div>
                   <div class="img-dog img5"><img src="{{ asset('frontend/images/img-5.png') }}"></div>
                    <div class="img-dog img6"><img src="{{ asset('frontend/images/img-6.png') }}"></div>
                    <div class="heading-txt">
                    <p>Connecting Your Pets</p>
                    <h1>Let's Get <br>Started</h1>
                </div>
                </div>
                <div class="col-lg-6 login-detail text-center">
                    <h2>Welcome Home!</h2>
                    <p>Connect.Play.Invite.Earn Money</p>
                    <div class="login-img"><img src="{{ asset('frontend/images/fresh__3_-removebg-preview.png') }}"></div>
                    <button class="log-in Sign-Up-Free" type="button"><i class="far fa-smile"></i> Sign Up Free 
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>

                    <button class="log-in Continue-With-Phone-Number" type="button"><i class="fas fa-mobile-alt"></i> Continue With Phone Number <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>

                    <button class="log-in Continue-With-Facebook" type="button"><i class="fab fa-facebook" ></i> Continue With Facebook  <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>


                    <button class="log-in Continue-With-Google " type="button"><i class="fab fa-google"></i> Continue With Google <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>

                    <button class="log-in Continue-With-Apple " type="button"><i class="fab fa-apple"></i> Continue With Apple
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    <div class="or"><p class="mb-0">or</p></div>

                    <span class="owner-not">Not A Pet Owner?</span>

                    <button class="log-in Feed-Dog-In-Need" type="button"><i class="fas fa-paw"></i> Feed A Dog In Need
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>