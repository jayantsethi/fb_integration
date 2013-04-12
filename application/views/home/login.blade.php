<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
{{HTML::style('css/bootstrap.css')}}       
{{HTML::style('css/bootstrap-responsive.css')}}
<title>Login with fb</title>
</head>
<body>
<h1>Log in to Our website</h1>
<div id="fb-root"></div>
 
 
 <a href="#" id="fb-login" onclick="login(); return false;" style="cursor: pointer;display: block; width: 286px; height: 41px; text-indent: -9999em; background: url('<?php echo URL::to_asset('img/fblogin.png') ?>') no-repeat scroll 0px 0px transparent">Log in</a>
 <br/><br/><a href="#" id="fb-logout" onclick="logout(); return false;" style="cursor: pointer">Log out</a>

{{HTML::script('js/jquery-1.7.2.min.js')}}
{{HTML::script('js/bootstrap.min.js')}}
<script>  

var BASE = "<?php echo URL::base(); ?>";
var email ="";
var name = "";
window.fbAsyncInit = function() {
    FB.init({
      appId      : '360749070698482', // App ID
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // connected
  } else if (response.status === 'not_authorized') {
    // not_authorized
  } else {
    // not_logged_in
  }
 });
  };

function login() {
FB.login(function(response) {
if (response.authResponse) {
testAPI();
} else {

}
},{scope: 'email,publish_actions'});
}

function logout() {
    FB.logout(function(response) {
        console.log('User is now logged out');
    });
}

function testAPI() {
    //console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
    	
    	email = response.email;
    	name = response.name;

    	//Login through FB
		
		sURL = BASE+'/fblogin/loginpart';
		var _postVar= jQuery.post(sURL,{emailId:email, uname:name});
		
		_postVar.done(function(data){
			resp = JSON.parse(data);
			
			if(resp.status == 0)
			{
			window.location.href = "<?php echo URL::to_action('fblogin@landing'); ?>";
			}
			else
			{
			alert("There was some problem with the login");	
			}
			});
		
		_postVar.fail(function(data){
			resp = JSON.parse(data);
			alert(resp.message);
			});
    	
    	});
    	

		
	   
}
  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>


</body>
</html>