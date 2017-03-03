<?php

 function add_arrival(){
include ("connection.php");
if (isset($_POST['add'])){
$img=$_FILES['img']['name'];
         $img_tmp=$_FILES['img']['tmp_name'];
         move_uploaded_file($img_tmp,"product/$img");
         $name = $_POST['name'];
      
	  
	   $addarr=$conn->prepare
       ("insert into brand
        (image,name)
         values
     ('$img','$name')
      ");
 if ($img==''  ){

      echo "<script>alert('Insert Image');</script>";                       
     }
     elseif($addarr->execute()){
       echo"<script>window.open('view_brand.php','_self');</script>";
      
        }
else{
        echo "<script>alert('something wrong');</script>";
       
         }
         }
         }
		 
		 
		 /*------------------View Brands ------------*/


function view_brand(){
    include ("connection.php");
      
      $fetch_pro=$conn->prepare("select * from brand ORDER BY id DESC");
      $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
      $fetch_pro->execute();
      $i=1;
      while ($row=$fetch_pro->fetch()):

 echo "<tr>
          <td> ".$i++." </td>
         
          
          <td>
          <img src = 'product/".$row['image']."' width='70px' height='60px';/>
          </td>
          <td>".$row['name']."</td>
          <td><a href = 'edit_pro.php?id=".$row['id']."'> Update</a></td>
          <td><a href = 'index.php?delete_pro=".$row['id']."&delete_img=".$row['image']."'> Delete</td>

     </tr>";
     endwhile;
	 
	 
	 
	
  }
  
 
 
   /*------------------Edit brand ------------*/
       function edit_brand(){
        include("connection.php");
       if (isset($_GET['id'])){
       $id = $_GET['id'];

     $fetch_pro=$conn->prepare("select * from brand where id = '$id'");
     $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
     $fetch_pro->execute();
     $row=$fetch_pro->fetch();
     $imgq=$row['image'];
  

       echo "
<form action='' method = 'post' enctype='multipart/form-data'>

<table>
<tr>
<td>SELECT New IMAGE </td>
<td><input type = 'file' name = 'img' >
    <img src = 'product/".$row['image']."' width='70px' height='60px';/>
    
</td>
</tr>

<tr>
<td>ENTER New Product NAME </td>
<td><input type = 'text' name = 'name'
    value='".$row['name']."'/>
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
         move_uploaded_file($img_tmp,"product/$img");
}
else
{
  $img=$imgq;
}
         $name = $_POST['name'];
        

       $up_pro=$conn->prepare("update brand set image='$img',name='$name' where id='$id'");

       if($up_pro->execute()){
        
         echo"<script>window.open('brand.php','_self');</script>";
}
}
} 




      
       }
		 


?>