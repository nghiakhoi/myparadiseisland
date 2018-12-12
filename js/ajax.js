function createObject() {
var xmlhttp;

if(window.XMLHttpRequest){
xmlhttp=new XMLHttpRequest();
}else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
return xmlhttp;
}
var http = createObject();
function level2(id)
{
	document.getElementById("result").innerHTML="<img src=""/>";
	http.open('post','<?php echo base_url();?>index.php/ajax/ajax_level2/'+id,true);
	http.onreadystatechange= process;
	http.send(null);
}

function process()
{
	if(http.readyState == 4 && http.status == 200)
	{
		result= http.responseText;
		document.getElementById('level2').innerHTML= result;
	}
}