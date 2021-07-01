
<div class="back" id="logSignOverlayy">
      <div class="login-wrap" >
      <div class="login-html ">
        <span class="closebtn" onclick="closeSignin()" title="Close Overlay">×</span>
        <input id="tab-1" type="radio" name="tab" class="sign-in" ><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
          <form class="sign-in-htm" id="IndivisualLog" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            onsubmit="return true">
            <div class="group">
            <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
              <label for="user" class="label">Username</label>
              <input name="user" id="in-userf"  value="" type="text" class="userf input" require class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span> 
              
              <label for="user" id="in-user"  class=" label" >username is required</label>
              
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input name="pass" id="in-passf" type="password" class="passf input" data-type="password" minlength="6" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
              <label for="pass" id="in-pass" class="pass label" >password is required</label>
             

            
            </div>
            <div class="group">
              <input name="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
 
              <input type="submit" name="login" class="button" value="Sign In" >
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <a href="#forgot">Forgot Password?</a>
            </div>
          </form>
          <form class="sign-in-htm" id="companyLog" >
            <div class="group">
              <label for="user" class="label">companyname</label>
              <input name="user" id="co-userf" type="text" class="input userf" 
               required>
              <label for="user" id="co-user" class=" user label " >username is required</label>
           
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input name="pass" id="co-passf" type="password" class="input passf" data-type="password" minlength="6" required>
              <label for="pass" id="co-pass" class="pass label " >password is required</label>
             
           
            </div>
            <div class="group">
              <input name="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign In">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <a href="#forgot">Forgot Password?</a>
            </div>
          </form>
          <!--sign in-->
          <form class="sign-up-htm " method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  id="IndiviualSign" onsubmit="return IndiviualSign()">
            <div class="group">
              <label for="fname" class="label">First Name</label>
              <input name="fname" id="in-fnamef" type="text" pattern="^[a-zA-Z ,.'-]+$" title="name must be letters only" class="input" required >
                
              <label for="fname" id="in-fname" class="label" style="display: none;" >First Name is required</label>

            </div>
            <div class="group">
              <label for="lname" id="in-lnamef" class="label">Last Name</label>
              <input name="lname" type="text" class="input">

            </div>
            <div class="group">
              <label for="user" class="label">username</label>
              <input name="user" id="in-S-userf" type="text" class="input" pattern="^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$" 
               title="Usernames may only contain letters and numbers and must be between 5 and 15 characters" required>
              <label for="user" id="in-S-user" class="label">username is required</label>

            </div>
            <div class="group">
              <label for="pass" class="label">Create Password</label>
              <input name="pass" id="in-S-passf" type="password" class="input" data-type="password" minlength="6">
              <label for="pass" id="in-S-pass" class="label">Please Create a Password</label>
               
            </div>
            <div class="group">
              <label for="pass"  class="label">Repeat Password</label>
              <input name="Rpass" id="in-passRf" type="password" class="input" data-type="password" >
              <label for="pass" id="in-passR" class="label">you have to Repeat Password</label>
           
            </div>
            <div class="group">
              <label for="Email"  class="label">Email Address</label>
              <input name="Email" id="in-Emailf" type="email" class="input" required >
             

            </div>
            <div class="group">
              <label for="birth"  class="label">Birth Date</label>
              <input name="birth" id="in-birthDatef" type="date" class="input" data-type="date" required >
              <label for="birth" id="in-birthDate" class="label"></label>
            
            </div>
            <div class="group">
              <label for="address"  class="label">Address</label>
              <input name="address" id="in-addressf" type="text" class="input" required>
              <label for="address" id="in-address" class="label">Addressis required</label>
            
            </div>
            <div class="group">
              <input type="submit" class="button" name="signin" value="Sign Up" >
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <label for="tab-1" onclick="openIndiviualLogin()">Already Member?</label>
            </div>
          </form>
          <form class="sign-up-htm "  id="companySign" onsubmit="return false" >
            <div class="group">
              <label for="birth"  class="label">Company name</label>
              <input name="birth" id="co-birthDatef" type="text" class="input" data-type="number" required >
              <label for="birth" id="co-birthDate" class="label">Company ID is required</label>
            
            </div>
            <div class="group">
              <label for="user" class="label">username</label>
              <input name="user" id="co-S-userf" type="text" class="input" pattern="^[a-z0-9]{5,15}$"
               title="Usernames may only contain letters and numbers and must be between 5 and 15 characters" required>
              <label for="user" id="co-S-user" class="label">username is required</label>

            </div>
            <div class="group">
              <label for="pass" class="label">Create Password</label>
              <input name="pass" id="co-S-passf" type="password" class="input" data-type="password" minlength="6" required>
              <label for="pass" id="co-S-pass" class="label">Please Create a Password</label>
               
            </div>
            <div class="group">
              <label for="pass"  class="label">Repeat Password</label>
              <input name="pass" id="co-passRf" type="password" class="input" data-type="password" required>
              
              <label for="pass" id="co-passR" class="label">you have to Repeat Password</label>
            </div>
            <div class="group">
              <label for="Email"  class="label">Company Email Address</label>
              <input name="Email" id="co-Emailf" type="email" class="input" required >
             

            </div>
            
            <div class="group">
              <label for="address"  class="label">Address</label>
              <input name="address" id="co-addressf" type="text" class="input" required>
              <label for="address" id="co-address" class="label">Address is required</label>
            
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign Up" >
            </div>
            
            <div class="foot-lnk">
              <label for="tab-1">Already Member?</a>
            </div>
            <div class="hr"></div>
          </form>
        </div>
      </div>
    </div></div>