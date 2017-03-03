<?php include 'db.php';?>



<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Simple Check Form With update And Delete Functionality </h1>
<div class="container">

<form class="form-group" method="post" action="insert.php" enctype="multipart/form-data">

<div class="form-group">
<label for="name">
Name
</label>
<input type="text" class="form-control" name="name">
</div>
<div class="form-group">
<label for="Age">
Age
</label>
<input type="int" class="form-control" name="age">
</div>
<div class="form-group">
<label for="nationality">
Nationality
</label>
<input type="text" class="form-control" name="nationality">
</div>
<div class="form-group">
<label for="picture">
Picture
</label>
<input type="file" class="form-control" name="pix">
</div>
 <button class = "btn btn-danger" type = "submit" name="submit">Add New </button>
</div>
</div>


</form>

<div class="container">
<table class="table table-condensed" border =1>
<th>ID </th>
<th>Name </th>
<th>Age </th>
<th>Nationality </th>
<th>Time</th>
<th>Image</th>
<th>Actions </th>


<?php

$strsql = "select * from table_check ";
if ($result = $mysqli->query($strsql)) {
   // printf("<br>Select returned %d rows.\n", $result->num_rows);
} else {
        //Could be many reasons, but most likely the table isn't created yet. init.php will create the table.
        echo "<b>Can't query the database, did you <a href = init.php>Create the table</a> yet?</b>";
    }
?>


 <?php
      //$result = $mysqli->query($strsql);
      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
            echo "<td>";
                echo $row['id'];
            echo "</td>";
             echo "<td>";
                echo $row['name'];
            echo "</td>";
             echo "<td>";
                echo $row['age'];
            echo "</td>";
             echo "<td>";
                echo $row['nationality'];
            echo "</td>";
		echo "<td>";
                echo $row['TIME'];
            echo "</td>";
            echo "<td>";
                echo "<img src=image/".$row['image']." height='70px'>";
            echo "</td>";
             echo "<td>";
                echo "<a class='btn btn-danger' href='delete.php?id=".$row{'id'}."'> Delete</a>";
                echo "<a class='btn btn-warning' href='update/check.php?id=".$row{'id'}."'> Update</a>";
            echo "</td>";
        echo "</tr>";
      }
    }



 ?>
</table>
</div>
<body>
</html>