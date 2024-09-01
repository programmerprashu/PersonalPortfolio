<?php
 include("connection.php");
 include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registser Page</title>
    <link rel="stylesheet" href="css/register.css">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        function showpass(){
            var pass=document.getElementById('pass');
            var eye=document.getElementById('eye');
            if (pass.type=='password') {
                pass.type='text';    
                eye.style.opacity='1';
            }else{
                pass.type='password';
                eye.style.opacity='0.3';
            }
        }
    
    </script>
</head>
<body>
 
    <div class="container-reg">
        <div class="card">
            <div class="cardtop">
                <!-- <img src="images/logo.png" alt="" width="100px" height="100px"> -->
                        <i><h4 style=" font-family:calibiri; color: white;
    text-shadow: 1px 2px 4px orangered;
    text-decoration: underline; font-weight:bold;  color:white; margin-top:14px;"> Registeration Form </h4></i>

          
            </div>
          
           
             
               
               <b style="color:yellow" id="emailerr"></b>
                <br> <form action="" name="form" method="post" >
               <div class="frow">
                <input type="text" name="name" id="name" placeholder="Enter Your Name" required>
               <input type="tel" name="tel" maxlength="10" required id="name" placeholder="Enter Your Contact">
             
               </div>
               <div class="frowpass">
                <input type="email" id="email" placeholder="Enter Your  Email " name="em" required>
              
                
                
              <div id="passicon">
                <input type="password" name="pass" placeholder="Enter Your Password" id="pass" required>
                <i class="fa-solid fa-eye" onclick="showpass();" id="eye"></i>
              </div>
               
               </div>
               <div class="frow">
               
               <span id="gen"> Gender
                <input type="radio" name="gen" value="male"  required >Male
                <input type="radio" name="gen" value="female"  required>Female
               </span>
               <!-- <input type="date" name="age" maxlength="10" required id="pin" placeholder="Enter Your Age"> -->
               <input type="text" name="dob"  placeholder="dd/mm/yyyy (Date of Birth)" required>
             
               </div>
               
                
                <input type="submit" name="submit" value="SignUp" onclick="errmsg();" >
                <div  id="success"  style="color:green; margin-top:8px; display:none;background:rgba(0, 10, ,10 ,0.8)">
                                <strong>Successfull! </strong>Account Registration Successfull.
                </div>
                <div  id="failure"  style="color:red; font-size:20px;  margin-top:8px; display:none; background:rgba(0, 10, ,10 ,0.8)">
                                <strong>Already Exists! </strong>Email or Mobile Number is already registered.
                </div>
               </form>
              
               <?php
               
              if( isset($_POST['submit'])){
                 $res=mysqli_query($con, "select *from tbl_user where email='$_POST[em]' or mobile='$_POST[tel]' ")  or die(mysqli_error($con));
                if($row= mysqli_fetch_array($res)){
                    ?>
                    <script type="text/javascript">
                      document.getElementById("success").style.display="none";
                      document.getElementById("failure").style.display="block";
                        
                    </script>

                    <?php

                }
                    else{
                        mysqli_query($con , "insert into tbl_user(name , mobile , email , password , gender , dob , dor , status ) values('$_POST[name]', '$_POST[tel]', '$_POST[em]', '$_POST[pass]' , '$_POST[gen]' , '$_POST[dob]' , curdate() , 'N')") or die(mysqli_error("Some Error Occurred"));
                        
                        ?>
                        <script type="text/javascript">
                      document.getElementById("failure").style.display="none";
                      document.getElementById("success").style.display="block";
                      window.location.href='login.php';
                        
                    </script>
                        <?php
                       // header("location:login.php");
                    }
               }
               ?>
                
               
                
                <span id="regbottom">
                    <a href="index.php" style="color:lightgreen; font-size: 24px;">Back</a>
                  <span>  If You have already account
                    <a href="login.php">Login</a></span>
                </span>
        </div>
    </div>
    
</body>
</html>

<?php
include("footer.php");
?>