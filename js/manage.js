window.onload=function(){

	oBtn_user = document.getElementById('btn-user');
	oBtn_manage = document.getElementById('btn-manage');

}

function btn_click(n)
{
	if(n==1)//click user management
	{
		oBtn_user.className="active";
		oBtn_manage.className="";
	}
	if(n==2)//click content management
	{
		oBtn_user.className="";
		oBtn_manage.className="active";
	}
	
}