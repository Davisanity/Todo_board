var myImage = document.querySelector('img');

myImage.onclick = function() {
    var mySrc = myImage.getAttribute('src');
    if(mySrc === 'Pics/profile.jpg') {
      myImage.setAttribute ('src','Pics/shiba.jpg');
    } else {
      myImage.setAttribute ('src','Pics/profile.jpg');
    }
}

function check_add_todo(){
	alert("de");
	return false;
	var n[6];
	n[0]  = document.form.note1.value;
	n[1] = document.form.note2.value;
	n[2] = document.form.note3.value;
	n[3] = document.form.note4.value;
	n[4] = document.form.note5.value;
	n[5] = document.form.note6.value;
	for (var i=0;i<6;i++){
		if(! anti_sql_inj(n[i])){
			return false;
		}
	}
	return true;
}

function anti_sql_inj(input){
	for (var i=0;i<input.length;i++){
		if( input.charAt(i) == '\'' || input.charAt(i) == '\"' ){
			alert("Want to sql injection?Please don't do that! \n");
			return false;
		}
	}
	return true;
}

