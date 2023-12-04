// Making login show and register hide if you click login
$(document).ready(function(){
   // $('.loginForm').hide();
   $('.registerForm').hide();

   $('.login').click(function(){
      $('.registerForm').hide();
      $('.loginForm').show();
   });
   // Making register show and login hide if you click register
   $('.register').click(function(){
      $('.registerForm').show();
      $('.loginForm').hide();
   });
});