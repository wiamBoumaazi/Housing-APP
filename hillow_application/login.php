<?php include 'db.php' ?>
<?php session_start();
include 'navbar.php';
?>
<style>
    .background {
        background-color: beige;
    }
    .texts {
        color: red;
    }
</style>
<html>
<div>
<div class = "background">
        <hr class = "invisible">
        <hr class = "invisible">
        <hr class = "invisible">
         
    <div class="body">
        <div id="pictures" class="column half" >
        <form action = "account_creation.php" method = "post">
            <h3 class = "sd-text">Create an account</h3>
            <?php
                if (isset($_GET['error'])){
                    if ($_GET['error'] == "emptyfields" ){
                    echo '<p class= " signuperror texts"> Fill in all the fields!</p>';
                }
                else if ($_GET['error'] == "invalidemailusername" ){
                    echo '<p class= " signuperror texts"> Invalid email!</p>';
                }else if ($_GET['error'] == "checkterms" ){
                    echo '<p class= " signuperror texts"> need to check terms and privacy box!</p>';
                }
            } 
            
            ?>

            <hr class = "invisible">
            <div class="form-group">
            <label for="name">First name</label>
              <div>
              <input type="text"  size = "35"  name = "first_name" placeholder="First Name">
              </div>
              <hr class = "invisible">
              <label for="name">Last name</label>
                <div>
                    <input type="text"  size = "35"  name = "last_name" placeholder="Last Name">
                </div>
              <hr class = "invisible">
                <div class="form-group input-group">&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="user_type" value="User" required>&nbsp; User
                    <input type="radio" name="user_type" value="Admin" style="margin-left: 5%" required>&nbsp; Admin
                </div>
            <hr class = "invisible">
              <label for="exampleInputEmail1">Email address</label>
              <div>
              <input type="email"  size = "35" name= "email"  placeholder="example@sfsu.edu">
            </div>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <hr class = "invisible">
              <label >Password</label>
              <div>
              <input type="password" size= "35" name="pwd" placeholder="Password" >
             </div> 
             <hr class = "invisible">
            <div class="form-group input-group">&nbsp;&nbsp;&nbsp;
                   <input type="radio" name="terms"  required>&nbsp;  <a class = "sd-text" href ="termandprivacy.php">&nbsp; Terms and privacy </a>
            </div>
                <hr class = "invisible">
            <div>
            <button type="submit" class="btn btn-primary" name = "signup">Sign up</button>
            </div>
            <br>
          </form>
    </div>
    <div id="contactform" class="column last" >
        <?php
        if (isset($_GET['error'])){
            if ($_GET['error'] == "invalidrole" ){
                echo '<p class= " loginerror texts"> something is wrong!</p>';
            }
        }
        ?>
        <form action = "logedin.php" method = "post">

            <h3 class = "sd-text">Already a user!</h3>
            <hr class = "invisible">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
              <div>
              <input type="text"  size = "35"  name = "email" placeholder="Email Address">
              </div>
                <hr class = "invisible">
                <label >Password</label>
            <div>
            <input type="password" size= "35" name= "pwd" placeholder="Password" >
           </div>
                <hr class = "invisible">

                    <div class="field">
                        <label>  You are a : &nbsp;
                            <input type="radio" name="user_type" value="User" style="margin-left:-2%"required>&nbsp; User
                            <input type="radio" name="user_type" value="Admin" style="margin-left: 2%" required>&nbsp; Admin
                        </label>
                    </div>

            <div>
            <button type="submit" class="btn btn-primary" name = "login">Log in</button>
            </div>
          </form>
    </div>
</div>
    <br><br>
</div>
</div>
<div>
    <?php include "footer.php" ?>
</div>
</body>
</html>
