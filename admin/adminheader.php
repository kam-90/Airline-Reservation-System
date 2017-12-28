<nav class = "navbar navbar-default" role = "navigation">
   
   <div class = "navbar-header">
      <button type = "button" class = "navbar-toggle" 
         data-toggle = "collapse" data-target = "#example-navbar-collapse">
         <span class = "sr-only">Toggle navigation</span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
      </button>
    
      <a class = "navbar-brand" href = "#">FLY HIGH</a>
   </div>
   
   <div class = "collapse navbar-collapse" id = "example-navbar-collapse">
  
      <ul class = "nav navbar-nav">
         <li><a href = "admin.php">Admin</a></li>
         <li><a href = "ViewCustomers.php">Customers</a></li>
         <li><a href = "Locations.php">Locations</a></li>
         <li><a href = "Destinations.php">Destinations</a></li>
         <li><a href = "setTicket.php">Tickets</a></li>
         <li><a href = "reservation.php">View Reservations</a></li>
      
      </ul>
      <?php
        if (!isset($_SESSION['user_name'])) { ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li>
            <li ><a href="#" class="active" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>

          <?php }

          else{ 
                
            ?>

             <ul class="nav navbar-nav navbar-right">
            <li><a href="home.php" class="active" ><span class="glyphicon glyphicon-user" ></span>
            <?php echo $_SESSION['user_name'] ?></a></li>
            <li ><a href="../logout.php" ><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
            </ul>


          <?php 
          }

      ?>
      
   </div>
   
</nav>