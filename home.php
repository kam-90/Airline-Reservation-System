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
  
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/Customjs.js"></script>
  
<script type="text/javascript">
function start1(){
    var start = document.getElementById('start');
     var end = document.getElementById('end');

   start.addEventListener('change', function() {
    if (start.value)
        end.min = start.value;
   }, false);
end.addEventLiseter('change', function() {
    if (end.value)
        start.max = end.value;
}, false);

}
</script>
</head>
<body onload="start1()";>

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

    <div class="col-sm-2">
    </div>

    <div class="col-sm-10 text-left center-div"> 
     <ul class="nav nav-tabs">
          <li class="active"><a href="#searchForm">Search Flights</a></li>
     </ul>
     <div class="col-sm-8 form" id="searchForm">
       
    <form name="searchForm" class="" action="FindDeals.php" method="post" >
    <br>
       <div class="form-group col-sm-6">
            <label class="control-label" for="firstname">From:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                <input class="form-control" required="required" id="location" placeholder="Location" name="loc" type="text" />
            </div>
            <div id="countryList"></div> 
      </div>
        
    <div class="form-group col-sm-6">
        <label class="control-label" for="firstname">To:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                <input class="form-control" id="des" required="required" placeholder="Location" name="des" type="text" />
            </div>
            <div id="destinationList"></div> 
    </div>
    
    <div class="form-group col-sm-6">
            <div class="input-group">
                <label><input type="radio" name="optradio" value="RoundTrip" checked="checked">Round Trip</label>
                  <label><input type="radio" name="optradio" value="OneWay">One Way</label>
            </div>
            
    </div>
    <br><br>
    <div class="form-group col-sm-8">
           <label class="control-label" for="Depart">Departure:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input type="date" id="start" required="required" class="form-control" name="depart">
            </div>
            
    </div>

    <div class="form-group col-sm-8">
           <label class="control-label" for="Arrival">Return:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input type="date" id="end" required="required" class="form-control" name="arrival">
            </div>
            
    </div>

    <div class="form-group col-sm-6">
           <label class="control-label" for="Adults">Adults</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                <input type="number" required="required" name="adults" class="form-control" id="usr" min="0" placeholder="How many Members Travelling" max="9"> 

            </div>
            
    </div>

    <div class="form-group col-sm-6">
           <label class="control-label" for="Children">Children(Under 12)</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                <input type="number" name="children" class="form-control" id="usr" min="0" placeholder="Children under 12" max="9"> 
            </div>
            
    </div>

    <div class="form-group col-sm-6">
            <div class="input-group">
            <label><input type="radio" name="class" checked="checked" value="Economy">Economy</label>
                      <label><input type="radio" name="class" value="Business">Business</label>
            </div>
            
    </div>

      <div class="form-group col-sm-12">
      <button type="submit" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn-block">Find Deals
      </button>
        
      </div>

     


</form>


       
           


      

     </div>

     

    </div>

    <div class="col-sm-2"></div>
    <!--<div class="col-sm-3 sidenav">
        <div class="well">
          <p>ADS</p>
        </div>
        <div class="well">
          <p>ADS</p>
        </div>
    </div>-->
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
