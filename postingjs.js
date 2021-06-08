      // buttons File & Photo
// const realfilebutn =document.getElementById("real-file");
// const cusftbtn =document.getElementById("custom-fileButton");
// const custFText =document.getElementById("custom-fileText");
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


  /*  the button cv file&Photo ends here*/



function validateform(){
                 var JobTitle = document.getElementById("JobTitle").value;
                    var Name = document.getElementById("Name").value;
          var Salary = document.getElementById("Salary").value;
                    var Description = document.getElementById("Description").value;
                    var Benefits = document.getElementById("Benefits").value;
          var Requirements = document.getElementById("Requirements").value;
        
         if (JobTitle== null ||JobTitle== "") {
                                    alert("Please enter Your JobTitle.");
                                    return false;
                                }
                                if (Name== null ||Name== "") {
                                    alert("Please enter your  Name.");
                                    return false;
                                }
                             if (Salary== null ||Salary== "") {
                            alert("Please enter the Salary.");
                            return false;
                        }
                        if (Benefits== null ||Benefits== "") {
                            alert("Please enter the job Benefits.");
                            return false;
                        }
            
            if (Description== null ||Description== "") {
                                alert("Please enter the job Description .");
                                return false;
                            }
                if (Requirements== null ||Requirements== "") {
                                    alert("Please enter the job Requirements .");
                                    return false;
                                }
                //     var imgFile=document.forms['PostForm']['imgfile'];
                //     if (imgFile.value !=''){
                //  //gfchgvhb
                //     }else{
                //  alert("no img choosen");
                //  return false;}
                 
       
                  alert('Submit successful');
                
                          document.getElementById("PostForm").reset();             
}



               












































