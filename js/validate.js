
 function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

  function checkval()
  {
     var x=document.forms["signin"]["email"].value;
     var y=document.forms["signin"]["password"].value;
     var correction = document.getElementById("wrong");
     var correction1 = document.getElementById("wrong1");
     var check=validateEmail(x);
    
     if(x=='' && y==''){
     	correction.innerHTML ="Please enter email";
     	correction1.innerHTML ="Please enter password";
     	return false;
     }

     else if(x=='')
     {
       correction.innerHTML ="Please enter Email";
       return false;
     }
     else if(!check){
       correction.innerHTML ="Please enter Email in abc@xyz.com format ";
       return false;
     }
     
     else if(y=='')
     {
     	correction.innerHTML ="";
       correction1.innerHTML ="Please enter password";
       return false;
     }
      else if(y.length==0 || y.length<7)
     {
     	correction.innerHTML ="";
       correction1.innerHTML ="Please enter password greater than 6 characters";
       return false;
     }
     else{
     	correction.innerHTML ="";
     	correction1.innerHTML ="";
     	return true;
     }
  }
     
    

