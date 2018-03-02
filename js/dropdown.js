
var flag;
var oTab_head;

window.onload=function()
{
	flag=0;
	oTab_head = document.getElementById('tab-head');
}
function clickDrop()
{
	console.log("tab onclick");
	if(flag==0)//若没有打开
	{
		oTab_head.className="dropdown open";
		flag=1;	
	}
	else{
		oTab_head.className="dropdown";
		flag=0;
	}
	
}
