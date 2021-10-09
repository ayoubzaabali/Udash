'use strict'

function addCategory(){
    var inputs=document.querySelectorAll(".worldclass");
    var array =[] ;
    Object.values(inputs).forEach(function(e){
     if(e.firstElementChild.hasAttribute("hidden")){
             array.push(e.firstElementChild.nextElementSibling.innerText);
         
     }

    });
    
    sendCats(JSON.stringify(array));
  
}
    
function enter(e){
   e.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    event.target.setAttribute('hidden','hidden');
    event.target.nextElementSibling.innerText=event.target.value;
    event.target.nextElementSibling.removeAttribute("hidden");
    
  }
}); 
}

function addfolder(){
$("#mymode").append("<div style='margin-left:5px' class='ffolder small pink'><span class='worldclass' style='width:90%;  white-space: nowrap;overflow: hidden;text-overflow: ellipsis; ' ><input onkeyup='enter(this)'  required style='width:100%'   type='text' placeholder='Label '><div onclick='showInput(this)' hidden></div></span></div>");
}

function showInput(e){
    e.setAttribute('hidden','hidden');
    e.previousElementSibling.value=e.innerText;
    e.previousElementSibling.removeAttribute("hidden");

}
    
function sendCats(data) {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
       if(this.responseText=="OK"){
            location.reload(); 
      }
    
   }
     };
  console.log("{{url('/')}}"+"/addCategories/"+data);
  xhttp.open("GET", uri+"/addCategories/"+data, true);
  xhttp.send();
 }
 