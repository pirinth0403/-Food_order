

    <?php include('partials/menu.php')?>  

         <!--Main content Section Starts -->
         
         <div class="main-content text-center"> 
            <div class="wrapper"> 
            <h1> Manage Admin </h1> 
            </br>  </br>  


            <?php 
                // Add method
                if(isset($_SESSION['add'])) 
                {
                    echo $_SESSION['add']; // Displaying Session Message
                    unset($_SESSION['add']); // Removing Session Message 
                }
                // delete method
                if(isset($_SESSION['delete'])) 
                {
                    echo $_SESSION['delete']; 
                    unset($_SESSION['delete']); 
                } 
                //Update method
                if(isset($_SESSION['update'])) 
                {
                    echo $_SESSION['update']; 
                    unset($_SESSION['update']); 
                } 
                //1. Update Password 
                if(isset($_SESSION['user-not-found'])) 
                {
                    echo $_SESSION['user-not-found']; 
                    unset($_SESSION['user-not-found']); 
                } 
                // pwd change success msg 
                if(isset($_SESSION['changed-pwd'])) 
                {
                    echo $_SESSION['changed-pwd']; 
                    unset($_SESSION['changed-pwd']); 
                } 

                //2. Update Password
                 if(isset($_SESSION['pwd-not-match'])) 
                 {
                     echo $_SESSION['pwd-not-match']; 
                     unset($_SESSION['pwd-not-match']); 
                 } 
            
            
            ?> 
            </br> </br> 
         








            <!-- Button to Add Admin-->
            <a href="add-admin.php" class="btn-primary">Add Admin</a> 

            </br>  </br>  

            <table class="tbl-full">    
              <tr>
                <th> S.N  </th>  
                <th> Full Name </th>  
                <th> UserName </th> 
                <th> Actions </th> 
               </tr> 

                <?php 
                    // Query to GET All Admin
                    $sql="SELECT * FROM tbl_admin";
                    // Execute the Query
                    $res = mysqli_query($conn, $sql);


                    $sn=1; // Assign the variable and increase
                    
                    // check whether the Query is Executed of not
                    if($res==TRUE) {
                        //Count Rows to check whether we have data in database or not
                        $count=mysqli_num_rows($res);

                        // Check the num of rows
                        if($count>0) {
                            // we have data in database
                               
                            while($rows=mysqli_fetch_assoc($res)) 
                            { 
                                 // using while loop to get all the data from database
                                 // And while loop will run as long as we have data in database

                                 // get induvial data 
                                 $id=$rows['id'];
                                 $full_Name=$rows['full_Name']; 
                                 $username=$rows['username']; 

                                // Display the values in our Table 
                                ?> 
                                        <tr>
                                        <td><?php echo $sn++;?></td> 
                                        <td><?php echo $full_Name;?> </td> 
                                        <td><?php echo $username;?></td>  
                                        <td>  
                                            <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change password</a> 
                                            <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary"> Upadate admin </a> 
                                            <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger"> Delete  admin </a> 
                                        </td> 
                                        </tr> 




                                <?php 
                                
                                


                                  
                            }

                        }
                        else { 
                            // we donot havr in database

                        }
                    }
                
                
                
                
                ?>











               
                <!-- <tr>
                <td>1</td> 
                <td>Printha </td> 
                <td>Printh </td> 
                <td>  
                    <a href="#" class="btn-secondary"> Upadate admin </a>
                    <a href="#" class="btn-danger"> Delete  admin </a> 
                </td> 
                </tr> 

                <tr>
                <td>2</td> 
                <td> Logu </td> 
                <td> lokki </td> 
                <td> 
                    <a href="#" class="btn-secondary"> Upadate admin </a>
                    <a href="#" class="btn-danger"> Delete  admin </a> 
                </td> 
                </tr>

                <tr>
                <td>3</td> 
                <td>Rikanthan </td> 
                <td>rikky </td> 
                <td> 
                    <a href="#" class="btn-secondary"> Upadate admin </a>
                    <a href="#" class="btn-danger"> Delete  admin </a> 
                </td> 
                </tr>
                -->

            </table>
           
           
           
        </div> 
        <!--Menu content Section ends --> 

        <?php include('partials/footer.php')?>   
  