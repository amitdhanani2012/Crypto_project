
var lat = [];
var lng = [];
var LatLng = [];
var sendusername =[];

var urq = [];
var rand = [];
var timestamp = [];

var urq1 = [];
  var rand1 = [];
  var timestamp1 = [];
  
  var e = [];
  var n = [];
  var phi = [];
  var cipher = [];
  var flag = [];
  var checkflag = [];
  var secretKey = [];
  var BsecretKey = [];
  var mapPublicKey = [];
  var BmapPublicKey = [];
  
  var Sec = [];
  var Sec1 = [];
  
function initialize() 
{
  var mapCanvas = document.getElementById("googleMap");
  var mapOptions = {
    center: new google.maps.LatLng(39.7684, -86.1581), 
    zoom: 8
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
 //zoomTocurrentLocation();
 
 secretKey=Math.floor((Math.random() * 10000) + 1); 
 BsecretKey = bigInt(secretKey); //alert(BsecretKey);
 
 // Calculate public key g^x mod p
 var p = bigInt('502121');
 var g = bigInt('221257');
 mapPublicKey = bigInt(g).modPow(BsecretKey, p);
  
}
function mySecretKey(){
sendusername=document.getElementById('sendusername').value;
  if(window.XMLHttpRequest)
{
 xmlHttp_rq=new XMLHttpRequest();
}
 else
{
 xmlHttp_rq=new ActiveXObject("Microsoft.XMLHTTP");
}
 xmlHttp_rq.onreadystatechange=function()
{

if (xmlHttp_rq.readyState === 4 || xmlHttp_rq.readyState === "complete")
{

xmlHttp_rq = xmlHttp_rq.responseXML;
alert('Your secret key is generated successfully!!');
} 
}
 xmlHttp_rq.open("POST","http://localhost/Crypto_Project/services/PrimSecret.php?usnName=" + sendusername  + "&randNum=" + BsecretKey  ,false);
 xmlHttp_rq.send();
}
function reqUserDrpdwn()
{ 

sendusername=document.getElementById('sendusername').value; //alert(sendusername);
$( "#userReq").empty();
 
var strReq = "<option selected='selected'>Select the User</option>";

 var secretRandNum = [];
 secretRandNum += '<p><font color="Blue"><table border="1" style="font-family:Georgia, Garamond, Serif;color:blue;font-style:italic;">Secret Random Numbers</p>';
 secretRandNum += '<tr><td>RandNumber</td><td>TimeStamp</td></tr></font>';
 
 if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlHttp_urq=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlHttp_urq=new ActiveXObject("Microsoft.XMLHTTP");
}
 
xmlHttp_urq.onreadystatechange=function()
{
   
if (xmlHttp_urq.readyState=== 4 ||  xmlHttp_urq.readyState=== "complete")
{
xmlDoc_urq= xmlHttp_urq.responseXML;

 urq = xmlDoc_urq.getElementsByTagName("userrequests");
 rand = xmlDoc_urq.getElementsByTagName("rand"); 
 timestamp = xmlDoc_urq.getElementsByTagName("timestamp"); 
/* for(var i =0; i< urq.length; i++)
{
strReq +=  "<option>" +  urq[i].childNodes[0].nodeValue + "</option>";
} */
for(var i =0; i< urq.length; i++)
{
  //polyLine = CellName_Polyline[k].childNodes[0].nodeValue + "-"; 
  
  urq1 =  urq[i].childNodes[0].nodeValue ;
  rand1 = rand[i].childNodes[0].nodeValue;
  timestamp1 = timestamp[i].childNodes[0].nodeValue;
  
  strReq +=  "<option value='"+urq1+"'>" +  urq1 + "</option>";  
  
	secretRandNum += '<tr><td>"'+rand1+'"</td><td>"'+timestamp1+'"</td></tr></font>';
}  
    $("#userReq").append(strReq);

 	var secretVal = 0;
	 $('#userReq').change(function() {
	 var l = 0;
	l=$( "#userReq" ).val();
	// alert(l);
	if (l=='Select the User'){
	$("#secret").hide();
	}else{
	 $("#secret").show();
     $("#secret").html(secretRandNum);
	 }
	 });
}
}
xmlHttp_urq.open("POST","http://localhost/Crypto_Project/services/userList.php?sendusername=" + sendusername, true);      
xmlHttp_urq.send();

}
function publicKey(){
sendusername=document.getElementById('sendusername').value;
if(window.XMLHttpRequest)
{
 xmlHttp_reg=new XMLHttpRequest();
}
 else
{
 xmlHttp_reg=new ActiveXObject("Microsoft.XMLHTTP");
}
 xmlHttp_reg.onreadystatechange=function()
{

if (xmlHttp_reg.readyState === 4 || xmlHttp_reg.readyState === "complete")
{

//alert('reached here');
xmlDoc_reg = xmlHttp_reg.responseXML;
alert('Sent!');
}
}
//alert ("http://localhost/codetev1/services/register.php?usn=" + usn + "&Name=" + Name + "&MobileNo=" + MobileNo + "&EmailID=" + EmailID + "&Account=" + Account,false);
 xmlHttp_reg.open("POST","http://localhost/Crypto_Project/services/updatePublickeyDH.php?mapPublicKey=" + mapPublicKey + "&sendusername=" + sendusername,false);
xmlHttp_reg.send();
}


function updatePublicKey(){

randY = bigInt(y); alert(randY);
var gx = [];
var biggx = [];
gx = $('table tr:nth-child(2) td:nth-child(2)').text();  alert('gx'+gx);
biggx = bigInt(gx); alert(biggx);
var p = bigInt('502121');
bigKr = bigInt(biggx).modPow(randY, p); alert(bigKr);

if(window.XMLHttpRequest)
{
 xmlHttp_reg=new XMLHttpRequest();
}
 else
{
 xmlHttp_reg=new ActiveXObject("Microsoft.XMLHTTP");
}
 xmlHttp_reg.onreadystatechange=function()
{

if (xmlHttp_reg.readyState === 4 || xmlHttp_reg.readyState === "complete")
{

//alert('reached here');
xmlDoc_reg = xmlHttp_reg.responseXML;
alert('Sent!');
}
}
//alert ("http://localhost/codetev1/services/register.php?usn=" + usn + "&Name=" + Name + "&MobileNo=" + MobileNo + "&EmailID=" + EmailID + "&Account=" + Account,false);
 xmlHttp_reg.open("POST","http://localhost/Crypto_Project/services/updatePublickey.php?e=" + e + "&n=" + n + "&phi=" + phi + "&cipher=" + cipher ,false);
xmlHttp_reg.send();
 
}

function retrieveSecret(){
sendusername=document.getElementById('sendusername').value; alert('j'+sendusername);
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlHttp_ret=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlHttp_ret=new ActiveXObject("Microsoft.XMLHTTP");
}
 
xmlHttp_ret.onreadystatechange=function()
{
if (xmlHttp_ret.readyState=== 4 ||  xmlHttp_ret.readyState=== "complete")
{
xmlDoc_ret = xmlHttp_ret.responseXML;

 Sec = xmlDoc_ret.getElementsByTagName("Sec"); 
 
for(var i =0; i< Sec.length; i++)
{
Sec1 = Sec[i].childNodes[0].nodeValue ;
}

var p = bigInt('502121'); 
var g = bigInt('221257');
var gy = [];
gy = rand1; 
var bigGY = bigInt(gy); alert('h'+bigGY);
var gxy = [];
gxy = bigInt(bigGY).modPow(Sec1, p); alert(gxy);
 
}
}
 alert ("http://localhost/Crypto_Project/services/retrieveNum.php?retrieveUname=" + sendusername,false);
xmlHttp_ret.open("POST","http://localhost/Crypto_Project/services/retrieveNum.php?retrieveUname=" + sendusername, true);      
xmlHttp_ret.send();

 
}