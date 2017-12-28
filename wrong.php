<?php
 session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="css/style1.css" />
  <script type="text/javascript" src="js/Customjs.js"></script>
<script>
  $(document).ready(function () {
      

});
     
    


</script>
</head>
<body>

<?php
 include("header.php");
?>

<div class="col-sm-12 container-fluid top"> 
    <br>
        <h3 class="screen-logo">WORLDWIDE TRAVELLING WITH FLY HIGH</h3>
        <H4 class="screen-mission">COLLABORATING WITH WORLD WIDE AIRLINES</H4>
    <br>

</div>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <!--<div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>-->

    

    <div class="col-sm-12 text-center"> 
     <h2>Sorry. Invalid Credentials.</h2>
     <h4><a href="#" data-toggle="modal" data-target="#login">Login again.</a><span style="padding-right: 20px; padding-left: 20px;">OR</span><a href="#" data-toggle="modal" data-target="#signup">SignUp</a></h4>

     
     </div>

   



</div>


 <!-- Modal -->
 <div class="modal fade modal-white" id="signup" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Signup</h4>
        </div>
        <div class="modal-body">


      <form id="signupForm" name="signupForm" action="register.php" method="post">
        <h1>create an account</h1>
        <input name="name" type="text" placeholder="What's your Full Name?" pattern="[a-zA-Z\s]+" autofocus="autofocus" required="required" class="input pass"/>
        <input name="password" type="password" placeholder="Choose a password" required="required" class="input pass"/>
        <input name="password2" type="password" placeholder="Confirm password" required="required" class="input pass"/>
        <input name="email" type="email" placeholder="Email address" class="input pass"/>
        <input type="submit" name="SignUp" value="Sign me up!" class="inputButton"/>
        <div class="text-center">
            already have an account? <a href="#" id="login_id" data-dismiss="modal">login</a>
        </div>
      </form>

        </div>

      </div>

    </div>
  </div>
  
  

  <!-- Modal -->
  <div class="modal fade modal-white" id="login" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <form action="checklogin.php" method="post">
                  <div class="form-group">
                      <label for="inputEmail">Email</label>
                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                  <div class="form-group">
                      <label for="inputPassword">Password</label>
                      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                  </div>
                  <div class="checkbox">
                      <label><input type="checkbox"> Remember me</label>
                  </div>
                  <button type="submit" name="btnLog" class="btn btn-primary">Login</button>
            </form>
        </div>
        
      </div>
      
    </div>
  </div>
 <!-- try -->

 <script>
    $(document).ready(function() {
      $('#signup').on('hidden.bs.modal', function() {
        $('#login').modal('show');
      });

         
      
    });
  </script>
 
</body>
</html>
