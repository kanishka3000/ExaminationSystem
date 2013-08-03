<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EMIS-IHRA</title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" language="javascript"></script>
<link rel="stylesheet" type="text/css" href="style/style.css" />

<script language="javascript">

function getVal()
{
var username = window.document.form1.username.value;
var password = window.document.form1.password.value;

//alert(username);

var url = "Script/login_1.php?username=" + username + "&password=" +password;
//alert(url);
if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	}
	else {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e) { }
		}
	}

//  var req = getXMLHTTP();
  xhr.open("GET",url,false);
  xhr.send(null);
var nk=xhr.responseText;
//alert(nk);
if(nk=="ok"){
    return true;
}
if(nk=="no")
    var prevWin = document.getElementById("notice");
		prevWin.innerHTML = "<span class='style2'>Invalid username or Password</span>";
  return false;
}



</script>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:612px;
	top:187px;
	width:103px;
	height:87px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:730px;
	top:226px;
	width:113px;
	height:92px;
	z-index:2;
}
#apDiv3 {
	position:absolute;
	width:189px;
	height:115px;
	z-index:3;
	left: 21px;
	top: 435px;
	visibility: visible;
}
#apDiv4 {
	position:absolute;
	width:600px;
	height:115px;
	z-index:4;
	left: 53px;
	top: 34px;
}
#apDiv5 {
	position:absolute;
	width:113px;
	height:76px;
	z-index:1;
	left: -150px;
	top: 2px;
}
#apDiv6 {
	position:absolute;
	width:682px;
	height:76px;
	z-index:4;
	left: 253px;
	top: 28px;
}
#apDiv7 {
	position:absolute;
	width:90px;
	height:110px;
	z-index:5;
	left: 71px;
	top: 20px;
}
#apDiv8 {
	position:absolute;
	width:853px;
	height:90px;
	z-index:6;
	left: 135px;
	top: 34px;
}
#apDiv9 {
	position:absolute;
	width:800px;
	height:100px;
	z-index:4;
	left: 190px;
	top: 34px;
	visibility: visible;
}
#apDiv10 {
	position:absolute;
	width:92px;
	height:101px;
	z-index:5;
	left: 82px;
	top: 27px;
}
.style2 {
	color: #FF0000;
	font-size: 18px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>

</head>
<body onLoad="MM_preloadImages('images/cal click.gif','images/news click.gif')">
<div id="wrapper">
		<div id="top">
		  <div id="apDiv9">
          <script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0','width','786','height','96','id','flash2','align','middle','src','flash2','quality','high','wmode','transparent','bgcolor','#7ac7ee','name','flash2','allowscriptaccess','sameDomain','allowfullscreen','false','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash2' ); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="786" height="96" id="flash2" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="flash2.swf" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#7ac7ee" />	<embed src="flash2.swf" quality="high" wmode="transparent" bgcolor="#7ac7ee" width="786" height="96" name="flash2" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>
          
          </div>
		  <div id="apDiv10"><img src="images/png logo.png" alt="lo" width="89" height="105" /></div>
	  </div>
<div id="content">
			<div >
			 <span>&nbsp;</span>
			</div>

<div id="menu">
				<ul>
					  <li class="active"><a href="" title="">Home</a></li>
                        <li><a href="AboutUs.php" title="">About Us</a></li>
                        <li><a href="http://lms.ucsc.cmb.ac.lk" title="">IHRA main site</a></li>
                        <li><a href="http://ucsc.cmb.ac.lk/wiki/index.php/Main_Page" title="">IHRA Wiki</a></li>

                        <li><a href="Help/index.php" title="">Support</a></li>
	  </ul>
			</div>
		  <div id="stuff">

			 <form name="form1" method="post" action="script/Login.php" onSubmit="return getVal();">
                        <fieldset>
                        <legend>Sign-In</legend>

                            <table width="250" border="0" cellspacing="10">
                              <tr>
                                <td><label for="label">Client ID:</label></td>
                                <td><input id="inputtext1" type="text" name="username" value="" /></td>
                              </tr>
                              <tr>
                                <td><label for="label">Password:</label></td>
                                <td><input id="inputtext2" type="password" name="password"  /></td>								<div id="notice"></div>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><input id="inputsubmit1" type="submit" name="inputsubmit1" value="Sign In" /></td>
                              </tr>
                            </table>
                            <label for="inputtext1"></label>
                            <label for="inputtext2"></label>
               </fieldset>
            </form>
			<br />
			<div id="apDiv3">
            <table border="1" >
            <tr>
            <td>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="207" height="119" align="absmiddle" title="Clock">
          <param name="movie" value="style/clock.swf" />
          <param name="quality" value="high" />
          <embed src="style/clock.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="188" height="108" align="absmiddle"></embed>
        </object>
        </td>
        </tr>
        </table>
            </div>
			<br />
			<br />
			<br />
			<br />


		  </div>
		</div>
	  <div id="bottom">
	  </div>
	</div>
</body>
</html>


