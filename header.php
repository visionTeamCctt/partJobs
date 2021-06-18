<header class="H-F" id="header">

    <!--logo-->
    <!--navbar as select * edit-->
    <div class="navbar">

      <!----------------------------navbar----------------------------->
      <!-- Indivisual --------------------1-->

      <div class="dropdown">
        <!--drop down list I found in w3schools-->
        <button class="dropbtn">Indiviual
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <table>

            <div>
              <tr class="head-0f-drop">
                <td><a href="jobs.php"><b>Jobs</b></a></td>
                <td> <a href="cvs.php"><b>CVs</b></a></td>
              </tr>
              <!--check if this is a link-->
              <tr>
                <td> <a href="#partTimeJobs" id="part-t-j" class="jobs" >part time jobs </a></td>
                <td> <a href="cvs.php">students</a></td>
              </tr>
              <tr>
                <td> <a href="#summerJobs" id="summer-job" class="jobs">summer jobs </a></td>
                <td> <a href="c">unemployed</a></td>
              </tr>
              <tr>
                <td> <a href="#weekendJobs" id="weekend-jobs" class="jobs">weekend jobs</a></td>
                <td> <a href="">Experience seekers</a></td>
              </tr>
              <tr>
                <td><a href="#workFromHome" id="work-from-home" class="jobs">work from home jobs</a></td>
              </tr>
              <tr>
                <td> <a href="#eveningJobs" id="evening-jobs" class="jobs">evening jobs</a></td>
              </tr>
              <tr>
                <td> <a href="#internships" id="internships-" class="jobs">internships</a></td>
              </tr>
              <tr>
                <td><a href="#apprenticeship" id="apprenticeship-" class="jobs">Apprenticeship</a></td>
              </tr>
            </div>

            <!-------------------------------------->
          </table>
        </div>
      </div>
       <!-- Employers -------------------------------2--->
      <div class="dropdown">
        <!--drop down list -->
        <!--Use any element to open the dropdown menu, e.g. a <button>, <a> or <p> element.
        Use a container element (like <div>) to create the dropdown menu and add the dropdown links inside it.
        Wrap a <div> element around the button and the <div> to position the dropdown menu correctly with CSS.-->
        <button class="dropbtn">Employers
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <div class="in-drop" id="jobs-drop">

            <table>

              <div>
                <tr class="head-0f-drop">
                  <!-- <td><a href="#"><b>Jobs</b></a></td> -->
                  <td> <a href="cvs.php"><b>CVs</b></td></a>
                </tr>
                <!--check if this is a link-->
                <tr>
                  <!-- <td> <a href="#">part time jobs </a></td> -->
                  <td> <a href="">unemployed</a></td>
                </tr>
                <tr>
                  <!-- <td> <a href="#">summer jobs </a></td> -->
                  <td> <a href="">Experience seekers</a></td>
                </tr>
                <tr>
                  <!-- <td> <a href="#">weekend jobs</a></td> -->
                </tr>
                <tr>
                  <!-- <td><a href="#">work from home jobs</a></td> -->
                </tr>

              </div>

              <!-------------------------------------->


              
            </table>

          </div>

        </div>
      </div>

      <a href="aboutUs.php">About us</a>
      <a href="contactUs.php">Contact</a>
    </div>
    <a href="index.php"><img src="imgs/logoSample (1).png" alt=""></a>
    <!--here goes the sign in and log in lists-->
    <div class="sign-log-in">
    <div class="dropdown"> 
        <!-- ad button to create an ad -->
        <button class="dropbtn" onclick="<?php if(isset($_SESSION["UserName"])){
?>location.href='Post.php' <?php }else{ ?>openIndiviualLogin();<?php }?>" >Create Your Ad</button>
      </div>
      <?php

if(isset($_SESSION["UserName"])){


?>
<div class="dropdown"> 
        <!-- ad button to create an ad -->
       
        
      </div>
      <div class="dropdown"> 
        <!-- ad button to create an ad -->
        <button class="dropbtn">
        
          
        <a class="dropbtn"  href="logout.php">Singout</a>
        </button>
      </div>
<?php 
}else{
?>
      <div class="dropdown"><!--sign in by clicking on the a tag -->
        <button class="dropbtn" >Sign in
          <i class="fa fa-caret-down" onclick="openSearch"></i>
        </button>
        <div class="dropdown-content">
          <a onclick="openIndiviualSignin()">Student</a><!--note : you can't have both href and onclick in a tag-->
          <a onclick="openCompanySignin()">Employer</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Log in
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a onclick="openIndiviualLogin()">Student</a>
          <a onclick="openCompanyLogin()">Employer</a>
        </div>
      </div>
      <?php }?>
    </div>
 <!--sign in log in block-->
    <?php include 'signInUpOverlay.php';?>



    <button class="openBtn" onclick="openSearch()"> <i class="fa fa-search fa-lg " onclick="openSearch()"></i></button>
    <!--search bar on the whole screen-->
    <div id="myOverlay" class="overlay">
      <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
      <div class="overlay-content">
        <form action="/action_page.php">
          <input type="text" placeholder="Search..use keywors like:Tripoli,marketing..." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
  </header>