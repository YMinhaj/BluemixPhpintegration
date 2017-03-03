<?php include 'db.php';




if(isset($_POST['submit']))
{


$name = $_POST['name'];
    $age = $_POST['age'];
    $national = $_POST['nationality'];
    $img=$_FILES['pix']['name'];
         $pro_img_tmp=$_FILES['pix']['tmp_name'];
         move_uploaded_file($pro_img_tmp,"image/$img");
    $strsq0 = "INSERT INTO table_check (name,age,nationality,image) VALUES ('" . $name . "','" . $age . "','" . $national . "','" . $img . "');"; //query to insert new message
    if ($mysqli->query($strsq0)) {
        //echo "Insert success!";

	echo "<script>alert('Member has been Added')
		window.location.href='index.php';

		</script>";
	
    } else {
        echo "Cannot insert into the data table; check whether the table is created, or the database is active. "  . mysqli_error();
    }


}






?>