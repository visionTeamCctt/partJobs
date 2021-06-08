      // buttons File & Photo
const realfilebutn =document.getElementById("real-file");
const cusftbtn =document.getElementById("custom-fileButton");
const custFText =document.getElementById("custom-fileText");
const imgfilebutn =document.getElementById("img-file");
const cusImtbtn =document.getElementById("custom-imgbutton");
const custImText =document.getElementById("custom-imgtext");
// buttons File & Photo


/*  the button cv file&Photo starts here*/
    
cusImtbtn.addEventListener("click",function(){
    imgfilebutn.click();
  });
  imgfilebutn.addEventListener("change",function(){
    if(imgfilebutn.value){
        custImText.innerHTML=imgfilebutn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];/*to not copy the full path*/ 
    }else{
        custImText.innerHTML="No File Choosen";
    }
  });    

cusftbtn.addEventListener("click",function(){
    realfilebutn.click();
  });
  realfilebutn.addEventListener("change",function(){
    if(realfilebutn.value){
        custFText.innerHTML=realfilebutn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];/*to not copy the full path*/ 
    }else{
        custFText.innerHTML="No File Choosen";
    }
  });
  /*  the button cv file&Photo ends here*/

 

function validateform(){
                 var fullname = document.getElementById("fullname").value;
                    var Univesetiy = document.getElementById("Univesetiy").value;
          var facebook = document.getElementById("facebook").value;
                    var linkedin = document.getElementById("linkedin").value;
                    var Maindomain = document.getElementById("Maindomain").value;

     
         if (fullname == null || fullname == "") {
                                    alert("Please enter Your Name.");
                                    return false;
                                }
                                if (Univesetiy== null ||Univesetiy== "") {
                                    alert("Please enter the Univesetiy Name.");
                                    return false;
                                }
                             if (Maindomain== null ||Maindomain== "") {
                            alert("Please enter Your Maindomain.");
                            return false;
                        }
                        if (facebook== null ||facebook== "") {
                            alert("Please enter the facebook URL.");
                            return false;
                        }
            
            if (linkedin== null ||linkedin== "") {
                                alert("Please enter the linkedin URL.");
                                return false;
                            }
                var Genderradios = document.getElementsByName("Gender");
                var formValidG = false;
                var G = 0;
                
                while (!formValidG && G < Genderradios.length) {
                    if (Genderradios[G].checked) formValidG = true;
                    G++;        
                }
            
                if (!formValidG){
                    alert("Must Choose the Gender!");
                return formValidG;
                } 
                                   
                var Positionrradios = document.getElementsByName("position");
                var formValidP = false;
                    var P = 0;
                
                    while (!formValidP && P < Positionrradios.length) {
                        if (Positionrradios[P].checked) formValidP = true;
                        P++;        
                    }
                
                    if (!formValidP){
                        alert("Must Choose the Position!");
                    return formValidP;
                    } 
             
                       /*im*g file validation img*/
        var filename=document.forms['CvForm']['realfile'];
        if (filename.value !=''){
     //gfchgvhb
        }else{
     alert("no file choosen");
     return false;}
        /*im*g file validation img*/
        var imgfilename=document.forms['CvForm']['imgfile'];
        if (imgfilename.value !=''){
     //gfchgvhb
        }else{
     alert("no img choosen");
     return false;}
                     alert('Submit successful');                           
}



               









































