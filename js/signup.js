function create_account(){  
    var n=document.getElementById("name").value;  
    var e=document.getElementById("email").value;  
    var p=document.getElementById("Setpassword").value;  
    var cp=document.getElementById("Confirmpassword").value;  
      const form= document.getElementById("signupform");
    //Code for password validation  
            var letters = /^[A-Za-z]+$/;  
            var email_val = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
    //other validations required code  
    if(n==''||e==''||p==''||cp==''){  
    alert("Enter each details correctly");  
    }  
    else if(!letters.test(n))  
            {  
                alert('Name is incorrect must contain alphabets only');  
            }  
    else if (!email_val.test(e))  
            {  
                alert('Invalid email format please enter valid email id');  
            }  
    else if(p!=cp)  
    {  
    alert("Passwords not matching");  
    }  
    else if(document.getElementById("Setpassword").value.length > 12)  
    {  
    alert("Password maximum length is 12");  
    }  
    else if(document.getElementById("Setpassword").value.length < 6)  
    {  
    alert("Password minimum length is 6");  
    }  
    else{   
  form.submit();
  window.location("signup.php")
console.log(n);
    console.log(e);
    console.log(cp);
    }  
    }  