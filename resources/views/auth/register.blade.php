<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
   <link rel="stylesheet" href="{{asset('css/foreign.css')}}" />
   <link rel="stylesheet" href="{{asset('css/myCss.css')}}" />
   <link rel="stylesheet" href="{{asset('css/main.min.css')}}" />
   <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}" />

   
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Aclonica&family=Lilita+One&display=swap" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" />
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Lilita+One&family=Tangerine:wght@400;700&display=swap" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <title>MYCIA - Sign Up</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>

<body>
       <!-- Navigation Bar -->
    
       <div>
            <nav class="navbar navbar-expand-lg menu py-1 fixed-top mb-3">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <h1><span class="mycia-text">MyCIA</span></h1>
                    </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  @if (Route::has('login'))
                  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        @auth
                        <a class="nav-link active text-white" aria-current="page" href="{{ url('/home') }}">Home</a>
                        |@else
                        <a class="nav-link text-white" href="{{ url('/home') }}">About</a>
                        <a class="nav-link text-white" href="{{ url('/home') }}">Academy</a>
                        <a class="nav-link text-white" href="{{ url('/home') }}">Contact</a>
                        <a href="{{ route('login') }}"><button id="signIn" type="button" class="btn btn-primary">Sign In</button> </a> |
                       

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"><button id="signUp" type="button" class="btn btn-primary">Sign Up</button></a>
                        @endif
                        @endauth
  
                    </div>
                  </div>
                </div>
              </nav>
              @endif
        </div>

    <!--END OF NAV BAR-->

    <!--REGISTER SECTION-->

<section id="home" class="mt-0 background">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#220147" fill-opacity="1" d="M0,32L48,69.3C96,107,192,181,288,229.3C384,277,480,299,576,293.3C672,288,768,256,864,224C960,192,1056,160,1152,165.3C1248,171,1344,213,1392,234.7L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>


    <div class="container">   
        <div class="container">
            <div class="row text-center">
                <h1 class="display-4 fw-light">Start Here</h1>
            </div>
        </div>
        <div class="row pt-2 pb-2 mt-3 mb-3">
            <div class="col-md">
                <img src="assets/images/arts/sign-up.svg" class="img-fluid" alt="">
            </div>

            <div class="col-md p-4 text-start">
                <div class="form w-100 pb-2 pt-2">
                    <!--color code for orange #E64E05-->

                    <form action="{{ route('register') }}" method="POST" class="row">
                    {{ csrf_field() }}
                        
                        <div class="mb-3">
                       
                            
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                            required autofocus placeholder="{{ trans('global.user_name') }}"
                             value="{{ old('name', null) }}">
                             @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        </div>
                        <div class="mb-3">
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        </div>
                        <div class="mb-3">
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        </div>
                        <div class="mb-3">
                        <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                        </div>
                        
                        <div class="mt-1">
                            <button class="btn btn-primary btn-block" name="submit_button" type="submit">Verify Email<span><i class="bi bi-arrow-right-circle"></i></span></i></button>
                        
                        </div>
                      
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#220147" fill-opacity="1" d="M0,32L80,53.3C160,75,320,117,480,154.7C640,192,800,224,960,202.7C1120,181,1280,107,1360,69.3L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
</section>
<!--FOOTER SECTION BEGINS-->

<footer class="intro-section pb-3 pt-4">
   

   

   <!--Useful Link Segment-->

   <div class="container">
       <div class="row text-white justify-content-center mt-3 pb-3" data-aos="fade-up"
       data-aos-duration="3000">
           <div class="col-12 col-sm-6 col-lg-4 mb-4">
               <h5 class="tlt text-capitalize fw-bold">MyCIA Token</h5>
               <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
               <p class="lh-lg">A Decentralized Platform for Learning and Earning</p>
           </div>

            <!--Internal Links-->

           <div class="col-12 col-sm-6 col-lg-4 mb-4 links">
               <h5 class="text-capitalize fw-bold tlt">Useful Links</h5>
               <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
               <ul class="list-inline company-list">

                   <li><a href="">Home</a></li>
                   <li><a href="">About</a></li>
                   <li><a href="">Purchase Token</a></l>
                   <li><a href="">Email Us</a></li>
                   <li><a href="">WhatsApp Us</a></li>

               </ul>
               
           </div>

           <!--External Links-->
           
           <div class="col-12 col-sm-6 col-lg-4 mb-4 links">
               <h5 class="text-capitalize fw-bold tlt">External Links</h5>
               <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
               <ul class="list-inline company-list">
                   
                   <li><a href="https://binance.com">Binance</a></li>
                   <li><a href="https://blockchain.com">Blockchain</a></li>
                   <li><a href="https://ftx.com/en">FTx</a></li>
                   <li><a href="https://www.tradingview.com/">Trading View</a></li>
                   <li><a href="https://coinmarketcap.com/">Coin Market Cap</a></li>

               </ul>
               
           </div>
       </div>
   </div>

    <!--Social Media Segment-->

    <div class="footer-sm shadow" style="background-color: oa1234;">
       <div class="container">
           <div class="row py-4 text-center text-white" data-aos="fade-up"
           data-aos-duration="3000">
               <div class="col-lg-5 col-md-6 mb-4 mt-3 mb-md-0">
                   Connect With Us <span><i class="bi bi-emoji-smile"></i></span>
               </div>
               <!--Facebook-->
               <div class="col-lg-7 col-md-6 text-white">
                   <a href=" https://www.facebook.com/mycia" target="_blank"><i class="bi bi-facebook"></i></a>

                   <a href="https://www.twitter.com/mycia" target="_blank"><i class="bi bi-twitter"></i></i></a>

                   <a href=" https://instagram.com/mycia" target="_blank"><i class="bi bi-instagram"></i></i></a>

                   <a href="https://www.youtube.com/mycia" target="_blank"><i class="bi bi-youtube"></i></i></a>

                   <a href="" target="_blank"><i class="bi bi-whatsapp"></i></a>

                   <a href=" https://t.me/mycia" target="_blank"><i class="bi bi-telegram"></i></i></i></a>
                   
               </div>

               
           </div>
       </div>
   </div>


   <!--Copyright Segment-->

   <div class="footer-sm shadow links" style="background-color: oa1234;">
       <div class="container">
           <div class="row py-4 text-center text-dark" data-aos="fade-up"
           data-aos-duration="3000">
               <div class="col-lg-5 col-md-6 mb-4 text-white">
                &copy; Crypto Insights Academy | Created By <a href="https://wa.link/6qrqtw" target="_blank">Reuson Solutions</a>
               </div>
               <!--Developer Contact-->
               <div class="col-lg-7 col-md-6">

                   <a href="https://twiter.com/reuben_dicksone" target="_blank"><i class="bi bi-twitter"></i></i></a>

                   <a href="https://www.instagram.com/create_with_tami/" target="_blank"><i class="bi bi-instagram"></i></i></a>

                   <a href="https://wa.link/6qrqtw" target="_blank"><i class="bi bi-whatsapp"></i></a>

                   <a href="https://github.com/ReubenDickson/Crypto-Insights-Academy" target="_blank"><i class="bi bi-github"></i></i></i></a>
                   
               </div>

               
           </div>
       </div>
   </div>

</footer>

<!--FOOTER SECTION ENDS-->

<!--SCRIPTS-->

   

   <!--BOOTSTRAP-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
   crossorigin="anonymous"></script>

   <!--ANIMATE ON SCROLL SCRIPT-->
   <script type="text/javascript" src="assets/js/myJavaScript.js" ></script>
   <script type="text/javascript" src="assets/js/foreign.js" ></script>
   <script type="text/javascript" src="js/aos.js" ></script>
   <!--JQuery-->
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/textillate/0.4.0/jquery.textillate.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.6.1/jquery.lettering.min.js" ></script>
   <!-- Moment JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>
   <!-- Moment Timezone JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.4/moment-timezone-with-data.js"></script>
   <!-- Countdown Timer JS -->
   <script src="js/timer.js"></script>
   
   <!--TYPING EFFECT-->

   <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>

   <script>
       $(function () {
   $('.tlt').textillate();
})

   </script>


<script>
   $(document).ready(function() {
     $(".fancy_title").lettering();
   });
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
 AOS.init();
</script>

<script>
   function comingSoon(){
       alert('This feature is coming soon!');
   }

   function purchaseToken(){
       alert("Presale is coming soon!")
   }
</script>
</body>
