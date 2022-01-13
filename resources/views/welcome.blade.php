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

        <title>MYCIA - Decentralized Learning and Earning</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
 
       <!-- <style>
            body {
                font-family: 'Nunito';
            }
        </style> -->
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
                        <a href="{{ route('login') }}"><button id="signIn" type="button" class="btn btn-primary">Sign In</button> </a>
                       

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

            <!-- INTRO SECTION STARTS-->

        
<section id="home" class="intro-section pb-3 home-section">

<!--SHAPES-->
<div class="bg-shapes">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!--SHAPES ENDS-->


  <div class="container" data-aos="fade-up"
  data-aos-duration="3000">
    <div class="row align-items-center text-white">
      <!-- START THE CONTENT FOR THE INTRO  -->
      <div class="col-md-6 intros text-start mb-3">
    
        <h1>
          <span data-out-effect="fadeOut" data-out-shuffle="true" class="tlt mycia-text">MyCIA</span> <span class="tlt">is a Decentralized Platform for Learning and Earning.</span>
        </h1>
        
        <div>
            
        <button onclick="purchaseToken()" type="button" class="btn btn-primary">Purchase Token
            <span><i class="fas fa-arrow-right"></i></span>
          </button>         
        </div>

      </div>
      <!-- Token Logo -->
      <div class="col-md-6 intros text-end">
        <div class="video-box">
          <img data-aos="flip-left" src="/assets/images/arts/myCiaToken-2.png" alt="video illutration" class="img-fluid">
         
        </div>
      </div>
    </div>
  </div>



</section>

<!--ABOUT US STARTS-->

<section id="home" class="mt-0 background">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#220147" fill-opacity="1" d="M0,32L48,69.3C96,107,192,181,288,229.3C384,277,480,299,576,293.3C672,288,768,256,864,224C960,192,1056,160,1152,165.3C1248,171,1344,213,1392,234.7L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>


    <div class="container">   
        <div class="container">
            <div class="row text-center" data-aos="fade-left">
                <h1 class="display-4 fw-light tlt mycia-head" data-aos="fade-up"
                data-aos-duration="3000">Who We Are</h1>
            </div>
        </div>

        <div class="row pt-2 pb-2 mt-3 mb-3" data-aos="fade-up"
        data-aos-duration="3000">
           
            <div class="col-md">
                <img data-aos="flip-left" src="assets/images/arts/vision.png" class="img-fluid" alt="">
            </div>

            <div class="col-md p-4 text-start">

                <p class="tlt text-orange lead display-2--description text-center" style="font-size: 25px;">Crypto Insights Africa is the leading cryptocurrency Community dedicated primarily to the training and retraining of  Crypto enthusiasts and prospects, building a framework that helps the rapid adoption of cryptocurrency and supporting an end goal of being a profitable trader.

                </p>
               
            </div>
        </div>
    </div>


    </div>
   
</section>

<!--ABOUT US SECTION 2 - VISION-->

<section id="home" class="mt-0 background">

    <div class="container">   
        <div class="container">
            <div class="row text-center" data-aos="fade-left">
                <h1 class="display-4 fw-light mycia-head" data-aos="fade-up"
                data-aos-duration="3000">Our Vision</h1>
            </div>
        </div>
        <div class="row pt-2 pb-2 mt-3 mb-3" data-aos="fade-up"
        data-aos-duration="3000">
           
            <div class="col-md">
                <img data-aos="flip-left" src="assets/images/arts/mycia.png" class="img-fluid" alt="">
            </div>

            <div class="col-md p-4 text-start">

                <p class="tlt text-orange lead display-2--description text-center" style="font-size: 25px;">MyCia is committed to maintain it's mission of cryptocurrency trading education, mentorship, support and providing a service driven ecosystem that ensures the maximum earning potentials of all traders in it's Community.
                </p>
               
            </div>
        </div>
    </div>


    </div>
    

</section>




<!--ABOUT US SECTION 3 - MISSION-->
<section>
    
    <div class="container">   
        <div class="container">
            <div class="row text-center" data-aos="fade-left">
                <h1 class="display-4 fw-light mycia-head" data-aos="fade-up"
                data-aos-duration="3000">Our Mission</h1>
            </div>
        </div>


        <div class="row pt-2 pb-2 mt-3 mb-3" data-aos="fade-up"
        data-aos-duration="3000">
            <div class="col-md">
                
                <p class="tlt text-orange lead display-2--description text-center" style="font-size: 25px;">As a leading cryptocurrency Community, MyCia focuses on consistent development of infrastructure that boasts the rapid adoption of cryptocurrency globally through the following ways;
                </p>

            </div>
        </div>

         <!--CARD ITEMS-->

         <div class="row pt-2 mt-3 mb-3" data-aos="fade-up"
         data-aos-duration="3000">

            <div class="container">
                <div class="col-md-12">
                    <div class="card shadow">
                        
                        <div class="card-body">
                          <p class="card-text"><i class="bi bi-bookmark-check"></i>Creating a platform that offers standard trading Courses and Trainings.</p>
                        </div>
                      </div>
                </div>
            </div>

        </div>
<!--CARD ITEM 2-->


        <div class="row pt-2 mt-3 mb-3" data-aos="fade-up"
        data-aos-duration="3000">

            <div class="container">
                <div class="col-md-12">
                    <div class="card shadow">
                        
                        <div class="card-body">
                          <p class="card-text"><i class="bi bi-bookmark-check"></i>Providing a solid support for Cryptocurrency/Forex market analysis and trading signals with 99% accuracy.</p>
                        </div>
                      </div>
                </div>
            </div>

        </div>

        <!--    item 3-->

        <div class="row pt-2 mt-3 mb-3" data-aos="fade-up"
        data-aos-duration="3000">

            <div class="container">
                <div class="col-md-12">
                    <div class="card shadow">
                        
                        <div class="card-body">
                          <p class="card-text"><i class="bi bi-bookmark-check"></i>Providing a profitable ecosystem for the peer-to-peer marketplace.</p>
                        </div>
                      </div>
                </div>
            </div>

        </div>

        
        <div class="row pt-2 mt-3 mb-3" data-aos="fade-up"
        data-aos-duration="3000">

            <div class="container">
                <div class="col-md-12">
                    <div class="card shadow">
                        
                        <div class="card-body">
                          <p class="card-text"><i class="bi bi-bookmark-check"></i>Supporting traders with trading bots (Artificial Intelligence).</p>
                        </div>
                      </div>
                </div>
            </div>

        </div>

        <!--ITEM 4-->

        
        <div class="row pt-2 mt-3 mb-3" data-aos="fade-up"
        data-aos-duration="3000">

            <div class="container">
                <div class="col-md-12">
                    <div class="card shadow">
                        
                        <div class="card-body">
                          <p class="card-text"><i class="bi bi-bookmark-check"></i>Providing solution for lending and borrowing mechanism through the use of the community token.</p>
                        </div>
                      </div>
                </div>
            </div>

        </div>

        <!--ITEM 5-->

        
        <div class="row pt-2 mt-3 mb-3" data-aos="fade-up"
        data-aos-duration="3000">

            <div class="container">
                <div class="col-md-12">
                    <div class="card shadow">
                        
                        <div class="card-body">
                          <p class="card-text"><i class="bi bi-bookmark-check"></i>Engaging traders in activities that promote consistent income earnings like staking, burnout rewards, affiliate/referal earnings and so on.</p>
                        </div>
                      </div>
                </div>
            </div>

        </div>

        <!--ITEM 6-->

        
        <div class="row pt-2 mt-3 mb-3" data-aos="fade-up"
        data-aos-duration="3000">

            <div class="container">
                <div class="col-md-12">
                    <div class="card shadow">
                        
                        <div class="card-body">
                          <p class="card-text"><i class="bi bi-bookmark-check"></i>Providing a solid support for cryptocurrency/forex market analysis and trading signals with 99% accuracy.</p>
                        </div>
                      </div>
                </div>
            </div>

        </div>


    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#220147" fill-opacity="1" d="M0,32L80,53.3C160,75,320,117,480,154.7C640,192,800,224,960,202.7C1120,181,1280,107,1360,69.3L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
</section>

<!--ABOUT US ENDS-->


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


</html>
