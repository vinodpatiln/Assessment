<?php
session_start();
if(isset($_POST["Import"])){
        require_once "config.php";
		$filename=$_FILES["file"]["tmp_name"];		
        $fname=$_FILES["file"]["name"];
        $allowed = array('csv');
        $ext = pathinfo($fname, PATHINFO_EXTENSION);
       
		if($_FILES["file"]["size"] > 0 && in_array($ext, $allowed))
		 {
		  	$file = fopen($filename, "r");
            $getData = fgetcsv($file, 10000, ",");
            //print_r($getData);
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {

               if(trim($getData[0])!="" && trim($getData[3])!=""){ 
                    
                    $sql="SELECT user_name FROM users WHERE user_name='".$getData[0]."'";
                    $check_user = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($check_user) > 0){
                        //echo('Email Already exists');
                    }else{
                        $sql = "INSERT into users (user_name,firstname,lastname,password, email_id) 
                        values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".md5($getData[3])."','".$getData[4]."')";
                        $result = mysqli_query($conn, $sql);
                        if(!isset($result))
                        {
                            echo "Invalid File:Please Upload CSV File";    
                            
                        }
                        else {
                            
                            //header("Location: home.php");

                        }
                       
                    }
                }else{
                    echo "username & password field should not be blank";
                }
	         }
             fclose($file);	
             $_SESSION['fileerror']="";
             header("Location: home.php");
	        
		 }else{
            //echo "Please Upload Valid File!!";
            $_SESSION['fileerror']="Please Upload Valid File!!";
            //echo "<script>confirm('Please Upload Valid File!!')</script>";
            header("Location: uploaddata.php");
         }
}	 


 ?>