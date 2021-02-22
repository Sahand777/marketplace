
        <title>FIRMOGRAM | Connecting Local Businesses {!!(empty($metas->meta_title))?((empty($metas->name))?'':"| $metas->name"):"| $metas->meta_title"!!}</title>
        <meta name="Keywords" content="{!!$metas->meta_keywords!!}" />
        <meta name="description" content="{!!$metas->meta_description!!}" />
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:image" content="http://www.firmogram.com/img/front/inner_logo.png" />
        
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/front/style.css') }}" />
        <!--<link rel="stylesheet" type="text/css" href="css/font-awesome.css" /> FONT-AWESOME-->


        <link rel="shortcut icon" href="{{ asset('img/favco.png') }}" >


        <!--        -------------------------------Jquery----------------------------- -->
        <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('/plugins/jQueryUI/jquery-ui-1.10.3.js') }}"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
        
        
        
        @if(Auth::id()!=null)
        
        <script type="text/javascript">
        
       FB.logout(function(response) {
                document.location.reload();
            });
        </script>
        
        @endif
        
        
        
        
        <script type="text/javascript">
            var URL = {!! json_encode(url('/')) !!};
            jQuery('document').ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        </script>

        
        <script type="text/javascript" src="//platform.linkedin.com/in.js">
                api_key: 81cfq88s87k40e
                onLoad: onLinkedInLoad
                authorize: true,

        </script>
        
        
        <!--facebook login-->
        
        
        <script>
            console.log(URL);
      window.fbAsyncInit = function() {
  FB.init({
    appId      : 310065199377372,
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  

  };
    
    
    
    function test(){
        FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
//        console.log('Welcome!  Fetching your information.... ');
        var url = '/me?fields=id,name,email';
        FB.api(url, function(response) {
            console.log(response);
//             alert(response.name + " " + response.id + " " +response.email);
        }, {scope: 'email'});
    });
    }
    
   (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

 
    

</script>
        
    
        
        
        
        
      
        
        
       