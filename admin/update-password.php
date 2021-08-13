<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br> <br>


        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td> New Password:</td>
                    <td>
                        <input type="password" name="New_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="Confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td coolspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>


<?php
// Check whether password  Button is Clicked or not 
if (isset($_POST['submit'])) 
{
    //echo "Clicked";
    //1.Get the Data from form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $New_password = md5($_POST['New_password']);
    $Confirm_password = md5($_POST['Confirm_password']);

    // EXCUTE THE QUERY 
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    // Excute the Query 
    $res=mysqli_query($conn, $sql); 
    if ($res==true) 
    {
        // Check Whether data is available or not 
        $count=mysqli_num_rows($res);

        if ($count==1) 

        { 
            // User Exists and Password can be Changed
            //echo "User Found";

             // Check whether the newpassword and confirm match or not 
             if($New_password==$Confirm_password) 
             { 
                 // Update the password
                 // echo "pwd matched";

                 // Create Query SQL2 update password
                 $sql2="SELECT * FROM tbl_admin WHERE password='$current_password'";

                 // Excute the Query 
                 $res2=mysqli_query($conn, $sql2);
                 if($res2==true) 
                 {
                        //Display suceess Message 
                        //Redirect to Manage Admin Page with Success message 
                        $_SESSION['changed-pwd']="<div class='success'> Password successfully changed </div>";
                        // Redirect the User 
                        header('location:'.SITEURL.'admin/manage-admin.php');  

                 } 
                 else
                 {
                      //Redirect to Manage Admin Page with error message 
                      $_SESSION['changed-pwd']="<div class='error'> Failed to password change </div>";
                      // Redirect the User 
                      header('location:'.SITEURL.'admin/manage-admin.php');  


                 }


             } 
             else 
             { 
                 //Redirect to Manage Admin Page with Error message 
                 $_SESSION['pwd-not-match']="<div class='error'> Password Did not Match </div>";
                 // Redirect the User 
                 header('location:'.SITEURL.'admin/manage-admin.php');  
             }
        } 
        else 
        {
            // User Does not Exist Set Message and REdirect
            $_SESSION['user-not-found']="<div class='error'> User not Found </div>"; 
            // Redirect to the User
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
}

?>





<?php include('partials/footer.php') ?>