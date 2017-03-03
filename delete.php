<?php include 'db.php';?>
<?php

$del_id = $_GET['id'];
$query = "delete from table_check where id =$del_id " ;
if($mysqli->query($query))
{
	echo "<script>alert('Member has been deleted')
		window.location.href='index.php';

		</script>";
}
?>