<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Company Login</title>

  <!-- Favicons-->
  <link rel="icon" href="{{asset('images/favicon/favicon-32x32.png')}}" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon/apple-touch-icon-152x152.png')}}">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="{{asset('images/favicon/mstile-144x144.png')}}">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="{{asset('css/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('css/style.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{asset('css/custom/custom.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('css/layouts/page-center.css')}}" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="{{asset('js/plugins/prism/prism.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>
<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->


  @if(isset(Auth::user()->email))
    <script>window.location="dashboard";</script>
   @endif

  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" method="POST" action="{{ url('api/checklogin') }}">
         {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 center">
            <!-- <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login"> -->
            <p class="center login-form-text">Login</p>
          
          </div>
        </div>

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
   
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif
      @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="email" name="email">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password">
               <div id="errors-list"></div>
            <label for="password">Password</label>
          </div>
        </div>
  
        <div class="row">
          <div class="input-field col s12">
            <button value="Login" type="submit" name="login" class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
         
          </div>
          <div class="input-field col s6 m6 l6">
                 </div>          
        </div>

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="{{asset('js/plugins/jquery-1.11.2.min.js')}}"></script>
  <!--materialize js-->
  <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
  <!--prism-->
  <script type="text/javascript" src="{{asset('js/plugins/prism/prism.js')}}"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="{{asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('js/plugins.min.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{asset('js/custom-script.js')}}"></script>

    <script>
    $(function() {
    // handle submit event of form
      $(document).on("submit", ".login-form", function() {
        var e = this;
        // change login button text before ajax
        $(this).find("[type='submit']").html("LOGIN...");

        $.post($(this).attr('action'), $(this).serialize(), function(data) {

          $(e).find("[type='submit']").html("LOGIN");
          if (data.token) { // If success then redirect to login url
            document.cookie = 'token ='+data.token;
            window.location = data.redirect_location;
          }
        }).fail(function(response) {
            // handle error and show in html
          $(e).find("[type='submit']").html("LOGIN");
          $(".alert").remove();
          var erroJson = JSON.parse(response.responseText);
          console.log(erroJson);
          $("#errors-list").html(`<div class="card-content red-text text-center">
                       <i class="mdi-alert-error"></i> ${erroJson.message}
                      </div>`);
       

        });
        return false;
      });
    });
  </script>

</body>

</html>