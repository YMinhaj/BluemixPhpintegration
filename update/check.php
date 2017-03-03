      <?php


        include("../db.php");
       if (isset($_GET['id'])){
       $id = $_GET['id'];

     $fetch_pro=$mysqli->query("select * from table_check where id = '$id'");
      while($row = $fetch_pro->fetch_assoc()) {
        $image = $row['image'];
        $name = $row ['name'];
        $age = $row ['age'];
        $national = $row ['nationality'];

      }

     $imgq=$row['image'];
  

       echo "
<form action='' method = 'post' enctype='multipart/form-data'>

<table>
<tr>
<td><b>ENTER New NAME </b></td>
<td>&nbsp;<input type = 'text' name = 'name'
    value='".$name."'/>
 </td>
 <td><b>ENTER New Age</b></td>
<td>&nbsp;<input type = 'text' name = 'age'
    value='".$age."'/>
 </td>
 <td><b>ENTER New nationality </b></td>
<td>&nbsp;<input type = 'text' name = 'nationality'
    value='".$national."'/>
 </td>
</tr>
<tr>
<td><b>SELECT New IMAGE </b></td>
<td><input type = 'file' name = 'img' >
    <img src = '../image/".$image."' width='70px' height='60px';/>
    
</td>
</tr>




</table>
<button name = 'upd_product'>Update Product </button>
</form>";


if (isset($_POST['upd_product'])){
if($imgq == $_FILES['img']['name'])
{
  $img=$imgq;
  
}
else if( $_FILES['img']['name']==true)
{
  $img=$_FILES['img']['name'];
         $img_tmp=$_FILES['img']['tmp_name'];
         move_uploaded_file($img_tmp,"../image/$img");
}
else
{
  $img=$imgq;
}
         $name = $_POST['name'];
         $age = $_POST['age'];
         $national = $_POST['nationality'];
        

       $up_pro=$mysqli->prepare("update table_check set image='$img',name='$name',age='$age',nationality='$national' where id='$id'");

       if($up_pro->execute()){
        
         echo"<script>window.open('../index.php','_self');</script>";
}
}
} 
?>