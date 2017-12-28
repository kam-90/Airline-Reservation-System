<?php
session_start();
require_once('../database.php');

$queryCustomers = 'SELECT * FROM currentloc
                           ORDER BY From_ID';
$statement2 = $db->prepare($queryCustomers);
$statement2->execute();
$locations = $statement2->fetchAll();
$statement2->closeCursor();

$querydest = 'SELECT * FROM destination
                           ORDER BY To_ID';
$statement2 = $db->prepare($querydest);
$statement2->execute();
$destinations = $statement2->fetchAll();
$statement2->closeCursor();
      


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Location</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <script>
     $(document).ready(function () {
          var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});


  </script>

  

  <style type="text/css">
    body {
    margin-top:40px;
}
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
  </style>


</head>

<body>
 <?php
 include("adminheader.php");
?>
<br><br>
<div class="col-sm-12 container-fluid top"> 
    <br>
        <h3 class="screen-logo">WORLDWIDE TRAVELLING WITH FLY HIGH</h3>
        <H4 class="screen-mission">Create Ticket</H4>
    <br>

</div>

<div class="container">
  
<div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
    </div>
  </div>
  
  <form role="form" action="insertTicket.php" method="post">
    <div class="row setup-content" id="step-1">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 1</h3>
          <div class="form-group">
            <label class="control-label">Airline Name</label>
            <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Airline Name" name="airline" />
          </div>
          <div class="form-group">
            <label class="control-label">Select Location</label>
              
                <select name="category_id" class="selectpicker">
                    <?php foreach ($locations as $loc) : ?>
                    <option value="<?php echo $loc['From_ID']?>"><?php echo ucfirst($loc['City_Name']) ?></option>
                    <?php endforeach; ?>
                </select>  

                <label class="control-label">Select Destination</label>
              
                <select name="dest_id" class="selectpicker">
                    <?php foreach ($destinations as $loc) : ?>
                    <option value="<?php echo $loc['To_ID']?>"><?php echo ucfirst($loc['Dest_City']) ?></option>
                    <?php endforeach; ?>
                </select>  
            
          </div>
          <div class="form-group">
            <label class="control-label">Ticket Type</label>
             <select name="Ticket_type" class="selectpicker">
                    
                    <option value="OneWay">One Way</option>
                    <option value="RoundTrip">Round Trip</option>
                  
                </select> 

          </div>
          
          <div class="form-group">
            <label class="control-label">Select Date</label>
             
                            <input type="date" id="start" required="required" class="form-control" name="depart">

          </div>

          <div class="form-group">
            <label class="control-label">Select Return Date</label>
             
                            <input type="date" id="end" required="required" class="form-control" name="arrival">

          </div>

          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-2">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 2</h3>
          <div class="form-group">
            <label class="control-label">Select Depart Time</label>
            <input required="required" type="Time" required="required" class="form-control" name="d_time" placeholder="Enter Time" />
          </div>
          <div class="form-group">
            <label class="control-label">Select Arrival Time</label>
            <input required="required" type="Time" required="required" class="form-control" name="a_time" placeholder="Enter Time" />
          </div>
          <div class="form-group">
            <label class="control-label">Select Return Depart Time</label>
            <input required="required" type="Time" required="required" class="form-control" name="return_depart_time" placeholder="Enter Time" />
          </div>
          <div class="form-group">
            <label class="control-label">Select Return Arrival Time</label>
            <input required="required" type="Time" required="required" class="form-control" name="return_arrival_time" placeholder="Enter Time" />
          </div>
          
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 3</h3>
            <div class="form-group">
            <label class="control-label">Economy Ticket Price</label>
            <input  max="10000" min=100 type="number" required="required" class="form-control" placeholder="Minimum Ticket Price 100" name="eco" />
             </div>

             <div class="form-group">
            <label class="control-label">Business Ticket Price</label>
            <input  max="10000" min=100 type="number" required="required" class="form-control" placeholder="Minimum Ticket Price 100" name="bus" />
             </div>

             <div class="form-group">
            <label class="control-label">Discount Ticket Price</label>
            <input  max="100" min=0 type="number" required="required" class="form-control" placeholder="Deal Discount Price"  name="dis" />
             </div>

             <div class="form-group">
            <label class="control-label">Seats for the Airline</label>
            <input  max="1000" min=50 type="number" required="required" class="form-control" placeholder="Enter Total Seats for Airline " name="seats"  />
             </div>

          <button class="btn btn-success btn-lg pull-right" type="submit" name="alpha">Submit</button>
        </div>
      </div>
    </div>
  </form>
  
</div>

</body>



</html>



