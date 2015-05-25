var eg={};
eg.$ = function(id)
{
	return document.getElementById(id);
}

function check()
{
	var uname = eg.$("uname");
	var upass = eg.$("upass");
	if(uname.value == '')
	{
		uname.focus();
		return false;
	}
	
	if(upass.value == '')
	{
		upass.focus();
		return false;
	}
	var xmlhttp;
	//非IE浏览器创建XmlHttpRequest对象
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    //IE浏览器创建XmlHttpRequest对象
    if (window.ActiveXObject) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e){
            try {
                xmlhttp = new ActiveXObject("msxml2.XMLHTTP");
            }
            catch (x){
            }
        }
    }
	var url = "usercheck.php?user="+uname.value+"&password="+upass.value;
	xmlhttp.open("GET",url,true);
	
	xmlhttp.send(null);
	
	var singe = 0;
	xmlhttp.onreadystatechange = function(singe){
	if(xmlhttp.readyState == 4){
			var msg = xmlhttp.responseText;
			if(msg == '1'){
				alert('用户名或密码错误!!');
				form.password.select();
				uname.value='';
				upass.value='';
				return false;
			}else{
				signe = 1;
				return true;
			}
		}
	}
	
	if(signe == 1)
	{
		return true;}
	return false;
}