<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update report</h2>
  <p>The form below contains two input elements; one of type text and one of type password:</p>
  <form action="reportView.php" method="post">
    <div class="form-group">
      <label for="patientName">Patient name:</label>
      <input type="text" class="form-control" id="patientName" name="patientName">
    </div>
    <div class="form-group">
      <label for="reportSubject">reportSubject:</label>
      <input type="reportSubject" class="form-control" id="reportSubject" name="reportSubject">
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="age" class="form-control" id="age"name="age">
    </div>
    <div class="form-group">
      <label for="doctor_id">Doctor ID</label>
      <input type="doctor_id" class="form-control" id="doctor_id" name="doctor_id">
    </div>
  
  <div class="form-group">
  <label for="report_info">report_info:</label>
  <textarea class="form-control" rows="10" id="report_info" name="report_info"></textarea>
  </div>

  <div class="form-group">
  <label for="report_time">Date:</label>
  <input type="date" id="report_time" name="report_time">
  </div>
 
  <br>
  <input type="submit" value="Submit" name="submit">
  <!--</form>-->
</form>
</div>
</div>

</body>
</html>



