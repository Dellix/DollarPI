function checkPwd(){
	
    var pass1 = document.getElementById('pwdField1');
    var pass2 = document.getElementById('pwdField2');

    if(pass1.value != pass2.value){
        document.getElementById("logBtn").disabled = true;
        document.getElementById("warning").innerHTML = '<i class="far fa-times-circle"></i>';
        
		}
   
    else{
		document.getElementById("logBtn").disabled = false;
		document.getElementById("warning").innerHTML = '<i class="far fa-check-square"></i>';
		
		}
	
	}

/*
function changePwdFieldBlur(str,field){
	
	if(document.getElementById(field).value == ''){
		document.getElementById(field).type = 'text';
		document.getElementById(field).value = str;}
	
	}
	
function changePwdFieldFocus(str,field){
	
	document.getElementById(field).type = 'password';
	if(document.getElementById(field).value==str) document.getElementById(field).value='';
	}

	
function isEmptyRegister(){
	
    var a=document.forms["Register"]["name"].value;
    var b=document.forms["Register"]["surname"].value;
    var c=document.forms["Register"]["mail"].value;
    var d=document.forms["Register"]["pwdField1"].value;
    var e=document.forms["Register"]["pwdField2"].value;
   
    if (a==null || a=="", b==null || b=="", c==null || c=="", d==null || d=="", e==null || e=="")
		{
        alert("Please Fill All Required Field");
        return false;
        }
	
	
	}
*/
