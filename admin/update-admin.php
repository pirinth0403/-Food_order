<?php include('partials/menu.php'); ?> 

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1> 
        <br> <br> 

        <?php
            //1.GET ID in the Admin page
            $id=$_GET['id'];

            //2.Create the sql Query from get the details
            $sql="SELECT * FROM tbl_admin WHERE id=$id"; 

            //3.Excute the Query
            $res=mysqli_query($conn,$sql); 

            //check whether query Excute or not 
            if($res==true){
                //Check whether data is avialble or not
                $count=mysqli_num_rows($res);
                // Check Whether we have admin data or not
                if($count==1) {  
                    //GET the Details
                    //echo "Admin is Available";  

                    $row=mysqli_fetch_assoc($res);
                    $full_Name=$row['full_Name']; 
                    $UserName=$row['username']; 

                }
                else {
                    //Redirect the  Manage admin page 
                    header('Location'.SITEURL.'admin/manage-admin.php'); 
                }

            }
        
        
        
        ?>





        <form action="" method="POST">
            <table  class="tbl-30"> 
                    <tr>
                        <td>fullName:</td> 
                        <td>
                             <input type="text" name="full_Name" value="<?php echo $full_Name; ?>"> 
                        </td> 
                    </tr> 
                    
                    <tr>
                        <td>UserName:</td> 
                        <td>
                            <input type="text" name="UserName" value="<?php echo $UserName; ?>"> 
                        </td>
                    </tr> 

                    <tr>
                        <td colspan="2">  
                            <input type="hidden" name="id" value="<?php echo $id?>"> 
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">  
                        </td>
                    </tr>

            </table>
        </form>
    </div>
</div>

<?php

            //check whether button click or not 
            if(isset($_POST['submit'])) {
                //echo "button is clicked"; 
                //Get the value from the form the details
                $_id=$_POST['id']; 
                $_full_Name=$_POST['full_Name']; 
                $_UserName=$_POST['UserName'];  

                // Create the SQl Query
                $sql="UPDATE tbl_admin SET full_Name='$_full_Name', UserName='$_UserName' WHERE id='$id' "; 

                // Excute the Query 
                $res=mysqli_query($conn,$sql);

                //Check Whether Query Excuted Sucessfully or Not
                if($res==true) {
                        // Admin page updated 
                        $_SESSION['update']= " <div class='success'>Admin page Sucessfully updated </div>";  
                        // Redirect to Manage admin page
                        header('location:'.SITEURL.'admin/manage-admin.php');  
    
                }
                else{
                         // Admin isnot page updated 
                         $_SESSION['update']= " <div class='error'>Admin page isnot Sucessfully updated </div>";  
                         // Redirect to Manage admin page
                         header('location:'.SITEURL.'admin/manage-admin.php');  
                }
                 

            }


?>







<?php include('partials/footer.php'); ?>