<!doctype html>  
<html>  
<head>  
<title>Register</title>  
    <style>   
        body{  
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: azure;   
    color: palevioletred;  
    font-family: verdana;  
    font-size: 100%  
      
            }  
            h1 {  
            color: indigo;  
            font-family: verdana;  
            font-size: 100%;  
               }  
            h2 {  
            color: indigo;  
            font-family: verdana;  
            font-size: 100%;  
                }     
            input{
            width: 10%;
            border: 1px;
            border-radius: 05px;
            box-shadow: 1px 1px 2px 1px gray;
            font-weight: bold;
                 }  
    </style>  
</head>  
<body>  
        <center><h1>Register Here to be a part of Hauper technology </h1></center>
                <!--  Regration form creation using html tags!-->
        <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>  
        <center><h2>Registration Form</h2></center>  
        <form action="" method="POST"  enctype="multipart/form-data"> 

            <legend>  
            <fieldset>  
          
            
            username: <br>
            <input type="text" name="user"><br><br> 

            password: <br>
            <input type="password" id ="pass" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Make it strong so easily not exploit by attacker(it must conatain one uppercase and lowercase letter , one numeric , one special and length should 8 or character)"><br><br>   
            

            image: <br>
            <input type ="file" name="image" id="image"/><br><br>

            firstname:<br>
            <input type ="text" name="fname" placeholder="enter you first name" /><br><br>

            lastname:<br> 
            <input type ="text" name="lname" placeholder="enter your last  name"/><br><br>



            gender: <br> 
            male<input type ="radio" name="gender" value="male"/>
            female<input type = "radio" name="gender" value="female"/><br><br>

    
    
            hobbies: <br> 
            sing   <input type ="checkbox" name="hobbies" value="singing"/>
            sports <input type ="checkbox" name="hobbies" value="sports" />
            travel <input type ="checkbox" name="hobbies" value="travelling"/><br><br>

                        
            country: <br>
            <select name="country" id="country">
            <option selected="selected" disabled="disabled">Select your country</option>
            <option  name="country"  value="India">India</option>
            <option  name="country"  value="Pakistan">Pakistan</option>
            <option  name="country" value="U.S.A."> U.S.A.</option>
            <option  name="country" value="China"> China</option>
            </select>
            <br><br>
 
              <input type ="submit" name="upload" value="Upload Image/Data"/><br><br>

            </fieldset>  
            </legend>  
        </form>


<?php
session_start(); 
if (isset($_SESSION['sess_user'])){
    header("location:member.php");
exit("here you are2");
}

if(isset($_POST['upload']))
{  


        
        if (isset($_POST['fname'])) {
        $fname = $_POST['fname'];
                                    }

        if (isset($_POST['lname'])){
        $lname = $_POST['lname'];
                                   }

        if (isset($_POST['gender'])){
        $gender = $_POST['gender'];
                                    }

        if (isset($_POST['hobbies'])){
        $hobbies = $_POST['hobbies'];
                                     }
        if (isset($_POST['country'])){
        $country = $_POST['country'];
                                     }


       
    if(!empty($_POST['user']) && !empty($_POST['pass'])) 
    {  
        $user=$_POST['user'];  
        $pass=$_POST['pass']; 

        // <?php
        if(!empty($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) 
        {
        $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        }
        //?
        //connectivity to database 
        $con = mysqli_connect('localhost','root','') or die(mysqli_error());  
        mysqli_select_db($con,'user_registration1') or die("cannot select DB");  


  //Query for the saving the username in databse

 $query=mysqli_query($con,"SELECT * FROM login WHERE username= '".$user."'");  
 $numrows=mysqli_num_rows($query);  
        

        //logic used to saved the username and password in databse
         if($numrows==0)  
        {  
            $sql="INSERT INTO login(`username`,`password`,`image`,`firstname`,`lastname`,`gender`,`hobbies`,`country`) VALUES ('$user','$pass','$file','$fname','$lname','$gender','$hobbies','$country')";  
            $result=mysqli_query($con,$sql);  
            if($result)
            {
        echo '<script type="text/javascript"> alert("Congrats your account created Successfully") </script>';
            }
    else{
        echo '<script type="text/javascript"> alert("Image Profile Not Uploaded") </script>';
        }

  
        } 
        else{  
            echo "That username already exists! Please try again with another.";  
            }  
  
    } 
    else{  
    echo "All fields are required!";  
        }  
}



?> 
</body>
</html>