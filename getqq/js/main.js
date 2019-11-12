
function list_lh(tag,c,bga,bgb) //鼠标移动改变背景
{
	var mlist = new Array();
	for(var i=1;i<c+1;i++)
	{
		mlist[i]=document.getElementById(tag+i);
		mlist[i].onclick=function ()
		{
			for(var k=1;k<c+1;k++)
			{
				if(mlist[k]==this)
				{
					mlist[k].style.background = bga;
				}
				else
				{
					mlist[k].style.background = bgb;
				}
			}
		}
	}
}
var miframe_kg=0;
function meun_list(tag_a,tag_b,me_count){
	$(tag_a).click(function(){
		$(tag_b).slideToggle();//单个DIV显示与隐藏
	});
}

function menu_list_yc()
{
	$("#left_close").click(function(){
		$("#left_menu").fadeToggle("slow",mfkg); //左侧框隐藏与显示
	});
}

function mfkg()
{
	if(miframe_kg==0)
	{
		miframe_kg=1;
	}
	else
	{
		miframe_kg=0;
	}
}

function miframe()
{
	var fwidth=document.body.offsetWidth-210;
	var d=document.getElementById("miframe");
	var left_main=document.getElementById("left_main");
	if(miframe_kg!=1)
	{
		d.style.width=fwidth+"px";
		left_main.style.display="";
	}
	else
	{
		d.style.width=fwidth+180+"px";
		left_main.style.display="none";
	}
	document.getElementById("mif").style.height="492px";
}

function body_load(type_i) //加载函数
{
	for(var i=1;i<type_i+1;i++)
	{
		meun_list("#list_"+i,"#list_t"+i,type_i+1);
	}
	list_lh("list_",type_i,"url(images/left_menu_ba.jpg)","url(images/left_menu_b.jpg)");
}

$(document).ready(function(){
	setInterval("miframe()",50);
	menu_list_yc();
	$("#miframe").load("left/iframe.txt");
	t1=$.ajax({url:'left/menu.txt',async:false});
	t2=$.ajax({url:'left/menu2.txt',async:false});
	t3=$.ajax({url:'left/menu3.txt',async:false});
	t4=$.ajax({url:'left/menu4.txt',async:false});
	$("#left_menu").html(t1.responseText);
	body_load(2);
	
	$("#mt1").click(function(){
		$("#left_menu").html(t1.responseText);
		body_load(2);
		return false;
	});
	$("#mt2").click(function(){
		$("#left_menu").html(t2.responseText);
		body_load(1);
		return false;
	});
	$("#mt3").click(function(){
		$("#left_menu").html(t3.responseText);
		body_load(1);
		return false;
	});
	$("#mt4").click(function(){
		$("#left_menu").html(t4.responseText);
		body_load(1);
		return false;
	});
});




