var flag;
var oForm;
var oBtnSubmit;
var oPw2;
var oPw1;
var oName;

window.onload=function(){

	oPw1 = document.getElementById('pw1');
	oPw2 = document.getElementById('pw2');
	oName = document.getElementById('nickname');
	oForm = document.getElementById('form');
	oBtnSubmit = document.getElementById('btn-submit');

	flag=0;

}

function pw2(){
	//When user click Register

	var insertText = " <input type='password' class='form-control password2' placeholder='Password Again'' required=''> ";
	oPw2.innerHTML = insertText;

	insertText = " <input type='text' name='nickname' class='form-control' placeholder='Nickname'' required=''> ";
	oName.innerHTML = insertText;

	oForm.action = "./php/register.php";

	insertText = "Register";
	oBtnSubmit.innerHTML = insertText;


	flag=1;

	console.log("sign in onclick !");

}

function pw1(){
	//When user click Login

	var insertText="";
	oPw2.innerHTML = insertText;
	oName.innerHTML = insertText;
	oForm.action="./php/login.php";
	
	insertText="Login";
	oBtnSubmit.innerHTML = insertText;

	flag=0;

	console.log("log in onclick !");
}
