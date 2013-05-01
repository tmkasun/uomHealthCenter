
var xmlhttp=null;

function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
var url="DisplayResult.php?q=" + str;
url=url+"&sid="+Math.random();
xmlhttp.open("GET",url,false);
xmlhttp.send(null);
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
