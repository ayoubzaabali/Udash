var  htmlinit= document.getElementById("table-files").innerHTML;
var  htmlinitadm= document.getElementById("admin-list").innerHTML;
var  htmlinitmeme= document.getElementById("users-list").innerHTML;

function intiligent(req){
    var data = req.value;
    document.getElementById("ftable").innerHTML= htmlinitdaka;  
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
          

         document.getElementById("ftable").innerHTML= this.responseText;   
       
         

   }
     };
    if(data.length==0){
     document.getElementById("ftable").innerHTML= "";  
       }else{
                              console.log("hana4");

  xhttp.open("GET", uri+"/SearchBack/"+data, true);
  xhttp.send();
       }
}


function Accept(req) {
    var data = req.getAttribute("data");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
       if(this.responseText=="OK"){
            location.reload(); 
      }

   }
     };
  xhttp.open("GET", uri+"/set/"+data, true);
  xhttp.send();
 }
    
function Delete(req) {
    var data = req.getAttribute("data");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     
           document.getElementById("datasend").submit();

   }
     };
  xhttp.open("GET", uri+"/sup/"+data, true);
  xhttp.send();
 }


function shFile(req){
    var data = req.value;
    var id=req.getAttribute("dataid");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
       
         document.getElementById("table-files").innerHTML= this.responseText;   
       
         

   }
     };
    if(data.length==0){
          document.getElementById("table-files").innerHTML= htmlinit;  
       }else{
  xhttp.open("GET", uri+"/shFile/"+data+"/"+id, true);
  xhttp.send();
       }
}



function shAdmin(req){
    var data = req.value;
    var id=req.getAttribute("dataid");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
       console.log()
         document.getElementById("admin-list").innerHTML= this.responseText;   
       
         

   }
     };
    if(data.length==0){
          document.getElementById("admin-list").innerHTML= htmlinitadm;  
       }else{
  xhttp.open("GET", uri+"/shAdmins/"+data+"/"+id, true);
  xhttp.send();
       }
}
function shMember(req){
    var data = req.value;
    var id=req.getAttribute("dataid");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
       console.log()
         document.getElementById("users-list").innerHTML= this.responseText;   
       
         

   }
     };
    if(data.length==0){
          document.getElementById("users-list").innerHTML= htmlinitmeme;  
       }else{
  xhttp.open("GET", uri+"/shMembers/"+data+"/"+id, true);
  xhttp.send();
       }
}

function empSH(req){
    var data = req.value;
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
       console.log()
         document.getElementById("emp-list").innerHTML= this.responseText;   
       
         

   }
     };
    if(data.length==0){
          document.getElementById("emp-list").innerHTML= htmlinitemp;  
       }else{
  xhttp.open("GET", uri+"/shEmps/"+data, true);
  xhttp.send();
       }
}


function deleteFile(req){
    var data = req.getAttribute("fileid");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     
        if(this.responseText=="OK"){
         function f() {
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__animated') ;
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__backOutUp') ;
             setTimeout(alertFunc, 600);
         }function alertFunc(){req.parentElement.parentElement.parentElement.parentElement.remove();}f();
        }

   }
     };
  xhttp.open("GET", uri+"/deleteFile/"+data, true);
  xhttp.send();
    
}

function deleteAdmin(req){
    var cat = req.getAttribute("catid");
    var usr = req.getAttribute("admin");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     
        if(this.responseText=="OK"){
         function f() {
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__animated') ;
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__backOutUp') ;
             setTimeout(alertFunc, 600);
         }function alertFunc(){req.parentElement.parentElement.parentElement.parentElement.remove();}f();
        }

   }
     };
  xhttp.open("GET", uri+"/deleteMA/"+cat+"/"+usr, true);
  xhttp.send();
    
}

function deleteEmp(req){
    var data = req.getAttribute("fileid");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     
        if(this.responseText=="OK"){
         function f() {
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__animated') ;
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__backOutUp') ;
             setTimeout(alertFunc, 600);
         }function alertFunc(){req.parentElement.parentElement.parentElement.parentElement.remove();}f();
        }

   }
     };
  xhttp.open("GET", uri+"/deleteEmp/"+data, true);
  xhttp.send();
    
}
function deleteProf(req){
    console.log('okk');
    var data = req.getAttribute("fileid");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     
        if(this.responseText=="OK"){
         function f() {
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__animated') ;
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__backOutUp') ;
             setTimeout(alertFunc, 600);
         }function alertFunc(){req.parentElement.parentElement.parentElement.parentElement.remove();}f();
        }

   }
     };
  xhttp.open("GET", uri+"/deleteProf/"+data, true);
  xhttp.send();
    
}


function profSH(req){
    var data = req.value;
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
         document.getElementById("prof-list").innerHTML= this.responseText;   
       
         

   }
     };
    if(data.length==0){
          document.getElementById("prof-list").innerHTML= htmlinitprof;  
       }else{
  xhttp.open("GET", uri+"/shProf/"+data, true);
  xhttp.send();
       }
}



function etdSH(req){
    var data = req.value;
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
         document.getElementById("etd-list").innerHTML= this.responseText;   
       
         

   }
     };
    if(data.length==0){
          document.getElementById("etd-list").innerHTML= htmlinitetd;  
       }else{
  xhttp.open("GET", uri+"/shEtd/"+data, true);
  xhttp.send();
       }
}  
    
    