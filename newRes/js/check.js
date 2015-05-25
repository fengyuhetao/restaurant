//判断输入的日期是否正确
function checkdata1(data){
	var str=data;
	 //在JavaScript中，正则表达式只能使用"/"开头和结束，不能使用双引号
	var Expression=/(\d{4}-)(\d{2}-)(\d{2})$/;  //匹配字符串中的指定位数，(\d{2})$表明以2个数字结尾
	var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
		return true;
	}else{
		return false;
	}
}	
function checkdata(data){ 
if (data=="")
    {return true;}
	subYY=data.substr(0,4)
	if(isNaN(subYY) || subYY<=0){
		return true;
	}
	//转换月份
	if(data.indexOf('-',0)!=-1){	separate="-"}
	else{
		return true;}
		
		area=data.indexOf(separate,0)
		subMM=data.substr(area+1,data.indexOf(separate,area+1)-(area+1))
		if(isNaN(subMM) || subMM<=0){
		return true;
	}
		if(subMM.length<2){subMM="0"+subMM}
	//转换日
	area=data.lastIndexOf(separate)
	subDD=data.substr(area+1,data.length-area-1)
	if(isNaN(subDD) || subDD<=0){
		return true;
	}
	if(eval(subDD)<10){subDD="0"+eval(subDD)}
	NewDate=subYY+"-"+subMM+"-"+subDD
	if(NewDate.length!=10){return true;}
    if(NewDate.substr(4,1)!="-"){return true;}
    if(NewDate.substr(7,1)!="-"){return true;}
	var MM=NewDate.substr(5,2);
	var DD=NewDate.substr(8,2);
	if((subYY%4==0 && subYY%100!=0)||subYY%400==0){ //判断是否为闰年
		if(parseInt(MM)==2){
			if(DD>29){return true;}
		}
		}else{
		if(parseInt(MM)==2){
			if(DD>28){return true;}
		}	
	}
	var mm=new Array(4,6,9,11); //判断每月中的最大天数
	for(i=0;i< mm.length;i++)
	{
		if (parseInt(MM) == mm[i])
		{
			if(parseInt(DD)>30){return true;}
		}
		else
		{
			if(parseInt(DD)>31){return true;}
		}
	}
	if(parseInt(MM)>12){return true;}
   return false;
}
function checkdate(obj){
	if(obj.value==""){
		alert("日期不能为空！");obj.focus();return false;
	}	
	if(!checkdata1(obj.value)||obj.value.length!=10){
		alert("您输入的基本格式不对（如:1920-07-07）!");obj.focus();return false;
	}
	if(checkdata(obj.value)){
		alert("您输入的日期不正确（如:1920-07-17）\n 请注意闰年!");obj.focus();return false;
	}
	return true;
}
//判断空
function checkform(form)
{
	for(i=0;i<form.length;i++)
		{
		  if(form.elements[i].value=="")
		  {
			  alert("请将信息填写完整！");
			  form.elements[i].focus();
			  return false;
		  }
		}
	return true;
}
//检查身份证号码
function checkeNO(NO){
	var str=NO;
	 //在JavaScript中，正则表达式只能使用"/"开头和结束，不能使用双引号
	var Expression=/\d{17}[\d|X]|\d{15}/; 
	var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
		return true;
	}else{
		return false;
	}
}			

function checkid(obj){
	if(!(obj.value.length==15 || obj.value.length==18)){
	  alert("身份证号只能为15位或18位!");obj.focus();
	  return false;
	}
	if(!checkeNO(obj.value)){
		alert("您输入身份证号码不正确!");obj.focus();
		return false;
	}
	return true;
}

//检查联系方式
function checktel(obj)
{
	if(!/(\d{3}-)(\d{8})|(\d{4}-)(\d{8})|1\d{10}/.test(obj.value))
	{
		alert("注意联系方式格式！");
		obj.focus();
		return false;
	}
	return true;
}