<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: news_del.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/


	$kol = 1;
	require $modules['adminmenu'][0];

	selectdb(wcf);
	$cres = mysql_query("SELECT count(`date`) as kol FROM `wcf_news` ") or trigger_error(mysql_error());
	$kolzap = mysql_fetch_array($cres);

	if ($kolzap['kol'] > $config['page_news_del'])
		{
    			$PageLen = $config['page_news_del']; 
    			if (!isset($_GET['page']) or ($_GET['page'] == '')) {$StartRec = 0; }
			else 	$StartRec = ((int)$_GET['page']-1)*$config['page_news_del'];
		}
	else
		{
    			$PageLen = $config['page_news_del'];
			$StartRec = 0;
		}

	$kres = mysql_query("SELECT `id`,`date`,`title`,`text`,`cat` FROM `wcf_news` ORDER BY `date` DESC limit ".$StartRec.",".$PageLen) or trigger_error(mysql_error());

	echo"<form method='post'>";
	echo"<table width='90%' border='0' cellspacing='0' cellpadding='5' class='report'>";

	if (mysql_num_rows($kres) > 0 )
		{
   			while ($nres = mysql_fetch_array($kres))
				{
          				echo"<tr><td align='left' class='page'><input name=id type=radio value='".$nres['id']."'></td>";
          				echo"<td align='left' class='page'>".$nres['title']."</td>";
          				echo"<td align='right' class='page'>".$nres['date']."</td></tr>";
          				$kol++;
          			}

    			if ($kolzap['kol'] > $config['page_news_edit'])
				{
       					$PagesSelector = '-';
       					$PageCounter = ceil($kolzap['kol'] / $config['page_news_del']);

       					if (!isset($_GET['page']) OR ($_GET['page'] == '') OR ($_GET['page'] == '_')) $tp3 = 1;
       					else $tp3 = (int)$_GET['page'];

       					for ($i = 1; $i <= $PageCounter; $i++)
						{
           						if ($tp3 == $i) $PagesSelector .= ' '.$i.' -';
		   					else $PagesSelector .= ' <A href="index.php?modul=newsdel&page='.$i.'">'.$i.'</a> -';
           					}
      					echo"<tr><td height='30' colspan='3' align='center' valign='middle' class='head'><b>$PagesSelector</b></td></tr>";
     				}
    		}

	echo"<tr><td colspan='3' align='center' class='page'><input action='index.php' name='del' value='newsdel' type=hidden><input type='submit' value='$txt[menu_admin_news_del]'></td></tr></table></form>";

	if ( isset($_POST['del']) )
		{
   		if (isset($_POST['id']) AND ($_POST['id'] > 0))
			{

				$delQuery = "DELETE FROM `wcf_news` WHERE `id` = '".(int)$_POST['id']."'";
				mysql_query($delQuery) or trigger_error(mysql_error());

				if(mysql_query($delQuery) == true) { echo"$txt[admin_news_del_successfully]"; } else { echo"$txt[menu_auth_error]"; }

        			echo"<script type='text/javascript'> <!-- window.status = ''; window.location = 'index.php?modul=newsdel';//--> </script>";
				ReturnAdminNewsdel(10);
      			}
		}
?>