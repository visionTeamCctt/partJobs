<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Personal Online CV</title>
</head>

<body>

    <form class="main" onsubmit="return false">

        <section class="asset split about" id="about-section">
            <p class="title section-item"><span>upload your CV </span></p>
           
            <div class="asset-body">
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;">Basic info</h3>
                    <p>
                        <label for="fullname" > Full name*</label><br>
                        <input type="text" id="fullname"><br>
                        <label for="Univesetiy" >Univesetiy*</label><br>
                        <input type="text" id="Univesetiy"><br>
                        <label for="Maindomain" >Maindomain*</label><br>
                        <input type="text" id="Maindomain">
                    
                    
                    </p>
                </div>
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;">Contact Info:</h3>

                    <label for="facebook" >facebook*</label><br>
                        <input type="url" id="facebook"><br>
                        <label for="linkedin">linkedin*</label><br>
                        <input type="url" id="linkedin"><br>
                        <label for="twitter">twitter</label><br>
                        <input type="url" id="twitter"><br>
                        <label for="github">github</label><br>
                        <input type="url" id="github">
                </div>
            </div>
        </section>

        <section class="asset">
             <p class="title section-item"></p>
            <h3  style="text-align: left; margin: 10px; margin-left: 10%; font-size: large;">Gender & Position</h3>
           
            <div class="asset-body">
                <div class="GenderPosition section-item" style="margin-left: -10%;">
                    <div class="radio"  >
                        <div class="label"> Gender</div>
                        <label for="MGender">Male</label> <input type="radio" name="Gender" id="MGender" value="Male">
                        <label for="FGender">Femele</label> <input type="radio" name="Gender" id="FGender" value="Femele">
                      </div>
                    <div class="radio">
                        
                            <div class="label">
                              Position</div>
              <label for="posit1"> unemployed </label> <input type="radio" name="position" id="posit1" value="unemployed" >
                <label for="posit2"> cvSeekers </label> <input type="radio" name="position" id="posit2" value="cv seekers">
                          </div>
                        
                    </div>

                </div>
            </div>
        </section>

        <section class="asset split" id="skills-section">
            <p class="title section-item"><span></span></p>
            <div class="asset-body">
                <div class="section-item">
                    
                    <div class="field">
                        <div class="label" id="photo"> Photo</div>
                        <input type="file" name="imgfile" id="img-file" accept="image/*" style="border: 0cm;" hidden >
                        <button type="button" id="custom-imgbutton">choose Photo</button>
                      <span id="custom-imgtext" style="color: gray;">No Photo Choosen.</span>
                      </div>
                </div>
                <div class="section-item">
                   <!--  -->
                    <div class="field">
                        <div class="label">CV</div>
        <input type="file" name="realfile" id="real-file"  style="border: 0cm;" hidden >
            <button type="button" name="customfileButton" id="custom-fileButton">choose file</button>
          <span id="custom-fileText" style="color: gray;">No File Choosen.</span>
                      </div>
                </div>
             
            </div>
            
               <!-- new edit    section-items-->
               <div class="ss">
                <p class="title"></p>
                <div class="field btns">
                    
                    <button class="submit" id="submit" onclick="validateform()">Submit</button>
                    <br><br>
              
                
                  </div>
            </div>
        </section>

        

      

    </Form>

    <script src="cvscript.js"></script>
    <!-- <script>
        var aboutSection = document.getElementById("about-section");
        var skillsSection = document.getElementById("skills-section");
        var resumeSection = document.getElementById("resume-section");
        var storysSection = document.getElementById("storys-section");

        const menuLinks = document.querySelectorAll('.menu .menu-item');
        menuLinks.forEach(el => {
            el.addEventListener('click', function () {

                let sectionToGo = aboutSection;

                switch (this.id) {
                    case 'skills':
                        sectionToGo = skillsSection;
                        break;
                    case 'resume':
                        sectionToGo = resumeSection;
                        break;
                    case 'storys':
                        sectionToGo = storysSection;
                        break;
                }
                // Scroll smoothly to section
                sectionToGo.scrollIntoView({behavior: 'smooth'});
            })
        })

    </script> -->
</body>

</html>