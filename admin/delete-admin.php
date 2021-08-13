<?php

   // Include constants.php file here
   include('../config/constants.php');

       

    //!.get the ID of Admin to be deleted
    echo $id=$_GET['id'];


    //2.Create SQL Query to Delete Admin
    $sql="DELETE FROM tbl_admin WHERE id=$id";

    //Excute the Query 
     $res=mysqli_query($conn,$sql); 

    // Check whether the query excuted successfully or not 
    if($res==true) {
            //query excuted sucessfully and admin deleted
            //echo "Admin Deleted";   
            //Create Session variable to Display message
            $_SESSION['delete']="<div class='success'>Admin Deleted sucessfully</div>";
            //Redirect to Manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');      
    } 
    else {
        //echo "failed to  Deleted Admin"; 
        $_SESSION['delete']="<div class='error'>failed to Delete Admin.Try Again Later </div>"; 
        header('location:'.SITEURL.'admin/manage-admin.php');  
        

    } 

    //3.Redirect to Manage Admin page with message(success/error)    







?>