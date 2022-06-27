<?php 
session_start();
function check_login(){
    if(isset($_SESSION['user_id']) =="") {
        header("Location: login.php");
    }
}
function show_user_list(){
    
    require_once "config.php";               
    $Sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $Sql);  


    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>";


            while($row = mysqli_fetch_assoc($result)) {

                echo '<tr>
                        <td>' . $row['firstname'].'</td>
                        <td>' . $row['lastname'].'</td>
                        <td>' . $row['email_id'].'</td>
                        <td>';
                if($row['uid']!=$_SESSION['user_id']){
                    echo  '<a href="javascript:void(0)" class="btn btn-primary edit" data-id="'.$row['uid'].'">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger delete" data-id="'.$row['uid'].'">Delete</a></td>';
                }        
                echo '</tr>';        
            }
    
        echo "</tbody></table></div>";
     
    } else {
        echo "You have no data";
    }
    
}