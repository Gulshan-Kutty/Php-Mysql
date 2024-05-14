function validate_form(){


    var name = document.myform.name.value; // "myform" is the name given to the form tag and it is used to pick the values of input data within the form.
    var email = document.myform.email.value;
    var mobile = document.myform.mobile.value;
    var address = document.myform.address.value;
    var gender = document.myform.gender.value;
    var photo = document.myform.photo.value;
    var city = document.myform.city.value;

    
    var pattern_name = /^[a-zA-Z]+$/;

    var pattern_email = /^[^\s@]+@[^\d@][^\s@]+\.[^\s@]+$/;

    var pattern_mobile = /^[6-9]\d{9}$/;

    if(name.trim() == ""){
        document.getElementById("errname").innerHTML="<div class='error'> Please enter your name </div>";
        setTimeout(function(){
            document.getElementById("errname").innerHTML="";
        },2000)
        document.myform.name.focus();
        return false; // Halt execution, indicating validation failure
         // In each case, return false is used to immediately exit the function and prevent form submission or further processing, indicating that the corresponding validation has failed. This prevents the form from being submitted until all validation criteria are met. If all validations pass, the function will eventually reach return true, allowing the form submission to proceed.
    }else if(!(pattern_name).test(name)) // test keyword is used to check the pattern for the name
    {
        document.getElementById("errname").innerHTML="<div class='error'> Please enter valid name </div>";
        setTimeout(function(){
            document.getElementById("errname").innerHTML="";
        },2000)
        document.myform.name.focus();
        return false; 
    } 

    if (email.trim() == "") {
        document.getElementById("erremail").innerHTML = "<div class='error'>Please provide your email</div>";
        setTimeout(function () {
            document.getElementById("erremail").innerHTML = "";
        }, 2000);
        document.myform.email.focus();
        return false;
    } else if (!pattern_email.test(email)) {
        document.getElementById("erremail").innerHTML = "<div class='error'>Please enter a valid email</div>";
        setTimeout(function () {
            document.getElementById("erremail").innerHTML = "";
        }, 2000);
        document.myform.email.focus();
        return false;
    }

    if (address.trim() == "") {
        document.getElementById("erraddress").innerHTML = "<div class='error'>Please provide your address</div>";
        setTimeout(function () {
            document.getElementById("erraddress").innerHTML = "";
        }, 2000);
        document.myform.address.focus();
        return false;
    }

    if (mobile.trim() == "") {
        document.getElementById("errmobile").innerHTML = "<div class='error'>Please provide your mobile number</div>";
        setTimeout(function () {
            document.getElementById("errmobile").innerHTML = "";
        }, 2000);
        document.myform.mobile.focus();
        return false;
    } else if (!pattern_mobile.test(mobile)) {
        document.getElementById("errmobile").innerHTML = "<div class='error'>Please enter a valid 10-digit mobile number</div>";
        setTimeout(function () {
            document.getElementById("errmobile").innerHTML = "";
        }, 2000);
        document.myform.mobile.focus();
        return false;
    }

    if (gender == "") {
        document.getElementById("errgender").innerHTML = "<div class='error'>Please select your gender</div>";
        setTimeout(function () {
            document.getElementById("errgender").innerHTML = "";
        }, 2000);
        return false;
    }

    if (city == "") {
        document.getElementById("errcity").innerHTML = "<div class='error'>Please select a city</div>";
        setTimeout(function () {
            document.getElementById("errcity").innerHTML = "";
        }, 2000);
        return false;
    }

    if (photo == "") {
        document.getElementById("errphoto").innerHTML = "<div class='error'>Please upload a photo</div>";
        setTimeout(function () {
            document.getElementById("errphoto").innerHTML = "";
        }, 2000);
        return false;
    }

    return true; // If all validations pass

}



