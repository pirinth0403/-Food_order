<?php include('partials/menu.php')?> 

    <div class="main-content"> 
        <div class="wrapper"> 
         <h1> Add Admin</h1> 
            </br>  

            <?php 
                if(isset($_SESSION['add']))  // checking whether the session is set or not
                
                {
                    echo $_SESSION['add']; //Display the Session Message if sit
                    unset($_SESSION['add']);  // Remove session  message 
                }
            
            
            
            ?>













            <form action="" method="post">
                <table class="tbl-30"> 
                    <tr>
                        <td>FullName:</td> 
                        <td><input type="text" name="Full_Name" placeholder="Enter Your Name"> </td> 

                    </tr> 

                    <tr>
                        <td>UserName:</td> 
                        <td>
                            <input type="text" name="username" placeholder="Enter user Name ">
                        </td>
                    </tr> 

                    <tr>
                        <td>Password:</td> 
                        <td>
                            <input type="password" name="password" placeholder="Enter user password ">  
                        </td>
                    </tr>

                    <tr> 
                        <td colspan="2"> 
                            <input type="submit" name="submit" value="Add admin" class="btn-secondary">  
                        </td>
                    </tr>
                </table>
            </form>

        </div>

    </div>
<?php include('partials/footer.php')?> 


    <?php 
        // Process the value from Form Save it in database

        // check whether the submit button is clicked or not

        if(isset($_POST['submit'])) 
         {
          
            
            // 1.Get the Data from form

             $Full_Name=$_POST['Full_Name']; 
             $username=$_POST['username']; 
             $password=md5($_POST['password']); 

             
            // 2. SQL Query to save the data into database  
             $sql="INSERT INTO tbl_admin SET
             Full_Name='$Full_Name',
             username='$username',
             password='$password' 
             ";

             //3. Executing Query and Saving into Database
             $res=mysqli_query($conn,$sql) or die();


             //4.Check Whether the data is inserted or not 
             if ($res==TRUE) {
                 // Data Inserted
                //echo "Data Inserted";
                // Create a Session Variable to Display Message 
                $_SESSION['add'] = "Admin Added Sucessfully";
                //Redirect Page to Manage admin 
                header("location:".SITEURL.'admin/manage-admin.php');
             }
             else {
                 // Failed to insert data
                 //echo "fail to Insert data"; 
                 // Create a Session Variable to Display Message 
                 $_SESSION['add'] = "Failed toAdd Admin ";
                //Redirect Page to add admin 
                header("location:".SITEURL.'admin/add-admin.php');
             }
            
            
              


         } 

        

       
    ?>

