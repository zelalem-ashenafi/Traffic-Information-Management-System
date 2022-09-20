

function validateform() {  

	const emailRe =
  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	const passwordRe= 
  /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
try {
	var lname=document.getElementsByName('lname')[0].value;
} catch (error) {
	var lname="h";
}
try {
	var name=document.getElementsByName('name')[0].value;
} catch (error) {
	var name="h";
}
try {
	var gfname=document.getElementsByName('gfname')[0].value;
} catch (error) {
	var gfname="h";
}
try {
var fname=document.getElementsByName('fname')[0].value; 
} catch (error) {
	var fname="h";
}
try {
var email=document.getElementsByName('email')[0].value;
} catch (error) {
	var email="hello@gmail.com";
}
try {
var phone=document.getElementsByName('phone')[0].value;
} catch (error) {
	var phone="0912";
}
try {
var password=document.getElementsByName('password')[0].value??"A123456789a";
} catch (error) {
	var password="A123456789a";
}
try {
var newpassword=document.getElementsByName('newPassword')[0].value??"A123456789a";
} catch (error) {
	var newpassword="A123456789a";
}
if ((lname.search(/^[A-Za-z]+$/) === -1)||(fname.search(/^[A-Za-z]+$/)===-1)){  
  alert("Name can't contain number");  
  return false;
 } else if (!email.match(emailRe)) {
	alert ("Invalid email")
	return false;
 }else if(!phone.startsWith("09")){

	alert("phone should start with '09'")
	return false;
 }

 else if(!password.match(passwordRe)){  
  alert("Password must be minimum eight characters, at least one letter or at least one number");  
  return false;  
  }  
 else if(!newpassword.match(passwordRe)){  
  alert("Password must be minimum eight characters, at least one letter or at least one number");  
  return false;  
  }  
}


  
