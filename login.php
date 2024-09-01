<?php
 session_start();
include("header.php");
include("connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
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
      function errmsg(){
        var email=document.getElementById('email');
        var emailerr=document.getElementById('emailerr');
        var pass=document.getElementById('pass');
        
        if (email.value=="") {
            emailerr.innerHTML="Please Enter Your Email or Phone";
           
        }else if(pass.value==""){
            emailerr.innerHTML="Please Enter Your Password";
        }else{
            emailerr.innerHTML="";
        }
      }

    </script>
</head>
<body>
    <div class="container-login">
        <div class="card">
            <div class="cardtop">
                <!-- <img src="images/logo.png" alt="" width="100px" height="100px"> -->
            <h1 align="center">Login </h1>
            </div>
          
            <form action="" name="form" method="post">
               
                <input type="text" id="email" placeholder="Enter Your  Email or Phone" name="em" required>
              
                
               <div class="eye_pass">
                <input type="password" name="pass" placeholder="Enter Your Password" id="pass" required>
                <i class="fa-solid fa-eye" onclick="showpass();" id="eye"></i>
               </div>
               <b style="color:yellow" id="emailerr"></b>
                <br>
                <br>
                <input type="submit" name="submit" value="Login" onclick="errmsg();" >

                 <div  id="failure"  style="color:red; font-size:20px;  margin-top:8px; display:none; background:rgba(0, 10, ,10 ,0.8)">
                                <strong>Does Not Match ! </strong>Invalid Email/Phone Or Password.                </div>
               </form>
                <p><a href="">Forget Password ?</a></p>
                
               
                <br>
               
                <div class="logbottom">
                    <a href="index.php"><b style="color:lightgreen; font-size: 22px;">Back</b></a>
                    <span>If You don't have account
                        <a href="register.php">SignUP</a>
                    </span>
                </div>
        </div>
    </div>

</body>
<?php
   
   include("connection.php");
            //    $email=$_POST['em'];
              if( isset($_POST['submit'])){
                 $res=mysqli_query($con, "select *from tbl_user where email='$_POST[em]' && password='$_POST[pass]' ")  or die(mysqli_error($con));

                if($row= mysqli_num_rows($res)){
                    $_SESSION['user']=$_POST['em'];
                    echo $_POST['em'];
                    ?>
                   
                     <script type="text/javascript">
                      
                      document.getElementById("failure").style.display="none";
                       alert('Successfully Login'); window.location.href='sdashboard.php';
                    </script>

                    <?php
                     //header("location:index.php");

                }
                    else{
                    ?>
                        <script type="text/javascript">
                      
                      document.getElementById("failure").style.display="block";
                        
                    </script>
                        
                        <?php
                       
                    }
               }
               ?>
                
</html>
<?php
include("footer.php");
?>
