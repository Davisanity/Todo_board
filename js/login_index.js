function checkL() {
	var id=document.form1.l_id.value;
	var p1=document.form1.l_pass.value;
	if ( !anti_sql_inj(id) ){
		document.form1.l_id.focus();
		document.form1.l_id.value="";
		document.form1.l_pass.value="";
		return false;
	}else if(!anti_sql_inj(p1)){
		document.form1.l_pass.focus();
		document.form1.l_pass.value="";
		return false;
	}
	return true;
}
function checkS(){
	var id=document.form2.s_id.value;
	var p1=document.form2.s_pass.value;
	var p2=document.form2.s_pass2.value;
	if(!anti_sql_inj(id)){
		document.form2.s_id.focus();
		document.form2.s_id.value="";
		return false;
	}
	else if(!check_passwd(p1,p2)){
		document.form2.s_pass.focus();
		document.form2.s_pass.value="";
		document.form2.s_pass2.value="";
		return false;
	}
	return confirm("請記住你的帳號:"+id+"\n以及密碼"); 	
}
function anti_sql_inj(input){
	for (var i=0;i<input.length;i++){
		if(input.charAt(i) == ' ' || input.charAt(i) == '\'' || input.charAt(i) == '\"' ){
			alert("Want to sql injection?Please don't do that! \n");
			return false;
		}
	}
	return true;
}

function check_passwd(pw1,pw2){
	// if(pw1==''){
	// 	alert("密碼不可以空白");
	// 	return false;
	// }
	// Now html can check that
	if (!anti_sql_inj(pw1) ){
		return false;
	}
	else if(!anti_sql_inj(pw2)){
		return false;
	}
	else if (pw1.length<4 || pw1.length>12){
		alert("password length is 4~12 \n")
		return false;
	}
	else if(pw1!=pw2){
		alert("密碼兩次打的不一樣捏");
		return false;
	}
	return true;
}
