function myalert(){
    alert("Hello brother\rlet's go somewhere.");
}

function myconfirm(){
   var conf =  confirm("Please select any one");
//    alert(conf)
    if (conf==true){
        document.getElementById("con").innerHTML= "User pressed confirm button";
    }else{
        document.getElementById("con").innerHTML= "User pressed cancel button";
    }
}

function myclick1(){
    var conf1 =  confirm("Please select any one");
 //    alert(conf)
     if (conf1==true){
         document.getElementById("1").innerHTML= "1";
     }else{
         document.getElementById("1").innerHTML= "User pressed cancel button";
     }
 }

function myprompt(){
    var name =  prompt("Please Enter your name");
    // alert(name)
     if (name==null){
         document.getElementById("name").innerHTML= "User pressed cancel button";
     }
     else if (name==""){
        document.getElementById("name").innerHTML= "Please provide your name";
    }
    else{
         document.getElementById("name").innerHTML= "Welcome "+name;
     }
 }

function myparameterfunc(name,desg, sal){
    document.getElementById("para").innerHTML = "Welcome "+ name+ " your designation is "+desg+" and salary is "+sal;
 }

function getval1(){
    document.getElementById('num2').value = document.getElementById('num1').value
    document.getElementById('num3').value = document.getElementById('num1').value

}

function getval2(){
    document.getElementById('num5').value = document.getElementById('num4').value

}

function getval3(){
    document.getElementById('num7').value = document.getElementById('num6').value

}

function getvals(oper)
{
    var val1=document.getElementById("v1").value;
    var val2=document.getElementById("v2").value;
    if(val1=="" || val2=="")
    {
        alert("please enter values");
    }else{
        document.getElementById("operator").innerHTML=oper;
        switch(oper)
        {
            case "+":
                document.getElementById("result").innerHTML = "="+(parseInt(val1)+parseInt(val2));
            break;
            case "-":
                document.getElementById("result").innerHTML = "="+(parseInt(val1)-parseInt(val2));
            break;
            case "*":
                document.getElementById("result").innerHTML = "="+(parseInt(val1)*parseInt(val2));
            break;
            case "/":
                document.getElementById("result").innerHTML = "="+(parseInt(val1)/parseInt(val2));
            break;
            case "%":
                document.getElementById("result").innerHTML = "="+((parseInt(val1)/parseInt(val2))*100);
            break;

            default:
                document.getElementById("v1").value = '';
                document.getElementById("v2").value = '';
                document.getElementById("result").innerHTML = '';
                document.getElementById("operator").innerHTML = '';

        }
    }
}


