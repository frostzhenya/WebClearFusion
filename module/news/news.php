<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: news.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

  	$kol = 1;
	$w_connect = mysql_connect($config['whostname'], $config['wusername'], $config['wpassword']);
	mysql_select_db($config['wdbName'], $w_connect);
	mysql_query("SET NAMES '".$config['encoding']."'");

  	$cres = mysql_query("SELECT count(`date`) as kol FROM `wcf_news`") or trigger_error(mysql_error());
	$kolzap = mysql_fetch_array($cres);

	if ($kolzap['kol'] > $config['page_news'])
		{
    			$PageLen = $config['page_news'];
 
    			if (!isset($_GET['page']) or ($_GET['page'] == '')) $StartRec = 0;
			else 	$StartRec = ((int)$_GET['page']-1)*$config['page_news'];
		}
	else
		{
    			$PageLen = $kolzap['kol'];
			$StartRec = 0;
		}

  	$kres = mysql_query("SELECT `date`,`title`,`text`,`cat` FROM `wcf_news` ORDER BY `date` DESC limit ".$StartRec.",".$PageLen) or trigger_error(mysql_error());
  	if (mysql_num_rows($kres) > 0 )
		{
     			echo"<table width='100%' border='0' cellspacing='0' cellpadding='5' class='report'>";

     			while ($nres = mysql_fetch_array($kres))
				{
					$NewCatPatch = $NewsCat[$nres['cat']][0];
					$NewCatTxt   = $NewsCat[$nres['cat']][1];

          				echo"<tr><th rowspan='2' align='left' width='80' height='80'><img src='$NewCatPatch' align='absmiddle' style=''></th>";
          				echo"<td align='left' class='head'>".$nres['title']."&nbsp;</td></tr>";
          				echo"<tr><td colspan='3' class='page'>".$nres['text']."</td></tr>";
          				echo"<tr><td align='right' colspan='3' class='page'>".$nres['date']."</td></tr>";
       					$kol++;
      				}

  			if ($kolzap['kol'] > $config['page_news'])
				{
  					$PageCounter = ceil($kolzap['kol'] / $config['page_news']);

   					if (!isset($_GET['page']) OR ($_GET['page'] == '') OR ($_GET['page'] == '_')) $tp3 = 1;
      					else $tp3 = (int)$_GET['page'];
 					echo"<tr><td height='30' colspan='3' align='center' valign='middle' >". ShowPageNavigator('index.php?modul=news&page=',$tp3,$PageCounter)."</td></tr>";
  				}
    			echo"</table>";
   		}
?>