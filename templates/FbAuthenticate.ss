<!DOCTYPE html>
<html> 
   <head> 
     <title>Client Flow Example</title>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
      <script>
   //Get access code from uri and pass it to server
   $(document).ready(function(){
   var token = window.location.hash;
   //console.log(token.substring(1));
   $.get('/signup/saveAuthToken?token='+token.substring(1),function(data){
   	//console.log(data);
   	window.location = "/signup";
   });
});
   </script>
   </head> 
   <body> 
   
   </body>
</html>
