<?php
$connection = mysql_connect('localhost', 'root') or die ('Unable to connect'. mysql_error());
mysql_select_db('ucscexam') or die ('Database not found' . mysql_error());
$txt = $_POST['txtSearch'];

$trimmed = trim($txt);
$keyword_array = explode(" ", $trimmed);

?> 
 
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Rounded Two | Home</title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style/style.css" />
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
	left:260px;
	top:235px;
	width:500px;
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
-->
</style>
</head>
<body>
	<div id="apDiv1">
				 <form id="form1" method="post" action="default.php">
				 		<p><font size="+2">Support</font></p>
                        <fieldset style="width:500px">
                        <p><font size="+1">Search Support</font></p>
						<input type="text" name="txtSearch" />
						<input type="submit" value="Search" />

                            
                        
               </fieldset>
            </form>
			<fieldset style="width:500px">
<?php

$size = count($keyword_array);

$count1 = 0;
$count2 = 0;

for($a = 0; $a<$size; $a++) {

	$first1 = $keyword_array[$a];
	for($b = 0; $b<$size; $b++) {
	
		$second1 = $keyword_array[$b];
		for($c = 0; $c<$size; $c++) {
		
			$third1 = $keyword_array[$c];
			$phrase1 = $first1 . $second1 . $third1;
			
			$query1 = 'SELECT * FROM searchTriple WHERE keyword LIKE "%'.$phrase1.'%"';
			$result1 = mysql_query($query1);
			$rows1 = mysql_num_rows($result1);
			
			while($line1 = mysql_fetch_array($result1,MYSQL_ASSOC)) {
			$last1 = array_unique($line1);
			echo '<a href = "'.$last1['url'].'">'.$last1['question'].'</a>';
			echo '<br>';

			}
			$count1 += $rows1;
			mysql_free_result($result1);
	
		}

	}

}

if($count1==0) {

	for($i = 0; $i<$size; $i++) {
		$first2 = $keyword_array[$i];
		for($j = 0; $j<$size; $j++) {
	
			$second2 = $keyword_array[$j];
			$phrase2 = $first2 . $second2;
			$query2 = 'SELECT * FROM searchDouble WHERE keyword LIKE "%'.$phrase2.'%"';
			$result2 = mysql_query($query2);
			$rows2 = mysql_num_rows($result2);
		
			while($line2 = mysql_fetch_array($result2,MYSQL_ASSOC)) {
			$last2 = array_unique($line2);
			echo '<a href = "'.$last2['url'].'">'.$last2['question'].'</a>';
			echo '<br>';
	
			}
			$count2 += $rows2;
			mysql_free_result($result2);

		}


	}
}

if($count1==0 && $count2==0) {

foreach($keyword_array as $keyword) {

	$query = 'SELECT * FROM search WHERE keyword LIKE "%'.$keyword.'%"';
	$result = mysql_query($query);
	while($line = mysql_fetch_array($result,MYSQL_ASSOC)) {
	
		$last = array_unique($line);
		echo '<a href = "'.$last['url'].'">'.$last['question'].'</a>';
		echo '<br>';
	
	}
	


}

mysql_free_result($result);
}
mysql_close($connection);





?>			
			
			
			
			</fieldset>
			 
			
			 </div>
	<div id="wrapper">
		<div id="top">
		</div>
		<div id="content">
			<div id="header">
			<span>&nbsp;</span>
            <span>&nbsp;</span>
			</div>

			<div id="menu">
				<ul>
					  <li class="active"><a href="" title="">Home</a></li>
                        <li><a href="AboutUs.php" title="">About Us</a></li>
                        <li><a href="http://lms.ucsc.cmb.ac.lk" title="">IHRA main site</a></li>
                        <li><a href="http://ucsc.cmb.ac.lk/wiki/index.php/Main_Page" title="">IHRA Wiki</a></li>

                        <li><a href="http://ucsc.cmb.ac.lk" title="">Support</a></li>
				</ul>
			</div>
		  <div id="stuff">


			<br /><br />
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


