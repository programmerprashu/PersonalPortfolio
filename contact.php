<?php
include("header.php");
?>
<link rel="stylesheet" href="css/login.css">
<style>
    .contact-container{
        
    display: flex;
    /* height:98vh; */
    align-items: center;
    justify-content: center;
    margin-bottom: 80px;

    }
</style>

<div class="contact-container">
     <div class="card">
            <div class="cardtop">
                <!-- <img src="images/logo.png" alt="" width="100px" height="100px"> -->
            <h1 align="center">contact Form</h1>
            </div>
          
            <form action="send-mail.php" name="form" method="post">
               
                <input type="text" id="email" placeholder="Enter Your  Name" name="name" required>
                <br>
                <input type="text" id="email" placeholder="Enter Your  Email or Phone" name="em" required>
              <br>
                
               <p style="color:white;">Enter Your Message:</p>
                <textarea name="message" cols="44" rows="4" id="" style="background: rgb(0, 0, 0, 0.4); color:white;"></textarea>
               
                <br>
                <br>
                <input type="submit" name="submit" value="Send Message" onclick="errmsg();" >


              
                <br>
               
                <div class="logbottom">
                    <a href="index.php"><b style="color:lightgreen; font-size: 22px;">Back</b></a>
                  
                </div>
        </div>

</div>
<?php
include("footer.php");
?>