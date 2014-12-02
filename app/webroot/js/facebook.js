
 window.fbAsyncInit = function() {
    FB.init({
      appId      : '389619224536157',
      xfbml      : true,
      version    : 'v2.2',
      status     : true,
      cookie     : true,
      oauth      : true
      
    });
  };
  
  
(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

/*
jQuery(function($){
$("#element").click(function() {
  FB.login(function(response) {
    if (response.authResponse){
      //L'utilisateur a autorisé l'application
      window.location.replace("http://adresse/de/redirection");
    } else {
      //L'utilisateur n'a pas autorisé l'application
    };
  }, {scope: 'email'});
});
}
*/

jQuery(function($){
   $('.facebookConnect').click(function(){
     var url = $(this).attr('href');
       FB.login(function(response){
           if (response.authResponse){
               window.location = url
           } 
         console.log(response);  
     }, {scope : 'email'});
       return false;
   });
});
