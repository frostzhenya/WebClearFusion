<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: newsedit.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	$w_connect = mysql_connect($config['whostname'], $config['wusername'], $config['wpassword']);
	mysql_select_db($config['wdbName'], $w_connect);
	mysql_query("SET NAMES '".$config['encoding']."'");

	$kol = 1;
	require $modules['adminmenu'][0];
   	require "include/tinymce.php";
   	echo $edit_script;

	$cres = mysql_query("SELECT count(`date`) as kol FROM `wcf_news` ") or trigger_error(mysql_error());
	$kolzap = mysql_fetch_array($cres);

	if ($kolzap['kol'] > $config['page_news_edit'])
		{
    			$PageLen = $config['page_news_edit']; 
    			if (!isset($_GET['page']) or ($_GET['page'] == '')) {$StartRec = 0; }
			else 	$StartRec = ((int)$_GET['page']-1)*$config['page_news_edit'];
		}
	else
		{
    			$PageLen = $config['page_news_edit'];
			$StartRec = 0;
		}

	$kres = mysql_query("SELECT `id`,`date`,`title`,`text`,`cat` FROM `wcf_news` ORDER BY `date` DESC limit ".$StartRec.",".$PageLen) or trigger_error(mysql_error());

	// ����� ������
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
       					$PageCounter = ceil($kolzap['kol'] / $config['page_news_edit']);

       					if (!isset($_GET['page']) OR ($_GET['page'] == '') OR ($_GET['page'] == '_')) $tp3 = 1;
       					else $tp3 = (int)$_GET['page'];

       					for ($i = 1; $i <= $PageCounter; $i++)
						{
           						if ($tp3 == $i) $PagesSelector .= ' '.$i.' -';
		   					else $PagesSelector .= ' <A href="index.php?modul=newsedit&page='.$i.'">'.$i.'</a> -';
           					}
      					echo"<tr><td height='30' colspan='3' align='center' valign='middle' class='head'><b>$PagesSelector</b></td></tr>";
     				}
    		}

	echo"<tr><td colspan='3' align='center' class='page'><input action='index.php' name='edit' value='newsedit' type=hidden><input type='submit' value='$txt[48]'></td></tr></table></form>";


	if ( isset($_POST['edit']) )
		{
   		if (isset($_POST['id']) AND ($_POST['id'] > 0))
			{
       				$nres = mysql_query("select * from `wcf_news` where `id` = ".$_POST['id'].' limit 1') or trigger_error(mysql_error());
	   			$nr = mysql_fetch_assoc($nres);

       				echo"<form method='post'><div align='center'><b>$txt[50]</b></div><br>";
				echo"<table width='100%' cellpadding='0' cellspacing='0' border='0' align='center'>";

             			echo"<tr><td width='10%' height='30' align='right' valign='middle'> $txt[51]</td>";
				echo"<td width='1%' height='30' >&nbsp;</td>";
             			echo"<td width='89%' height='30' align='left' valign='middle'><input name='modul' value='newsedit' type=hidden><input type='text' name='tema' size='60' value='".$nr['title']."'></td></tr>";

        			echo"<tr><td width='100' height='30' align='right' valign='middle'>$txt[52]</td>";
				echo"<td width='10' height='30' >&nbsp;</td>";
				echo"<td width='510' height='30' align='left' valign='middle'><input name='cmd' value='edit' type=hidden><input name='guid' value='".$nr['id']."' type=hidden>";

        			echo"<select name=cat>
             				<option value=0 selected>$txt[37]</option>
             				<option value=1>$txt[38]</option>
             				<option value=2>$txt[39]</option>
             				<option value=3>$txt[40]</option>
             				<option value=4>$txt[41]</option>
             				<option value=5>$txt[42]</option>
             				<option value=6>$txt[43]</option></select>";
				echo"</td></tr></table>";

       				echo"<textarea name='news'>".$nr['text']."</textarea>"; 
       				echo"<br><center><input type='submit' value='$txt[48]'/></center></form>";
      			}
		}

   	if ($_POST['cmd'] == edit)
		{	// �� �� �� ��������� ��� - �� ������. ����� ���� ��� �� ��������
        		if ($_POST['tema'] <> '') $nt = addslashes($_POST['tema']);
	    		else $nt = $txt[37+(int)$_POST['�at']];

			$editQuery = "UPDATE `wcf_news` SET `title`='".$nt."',`text`='".text_optimazer($_POST['news'])."',`cat`='".(int)$_POST['cat']."' WHERE `id`='".(int)$_POST['guid']."'"; 
	   		mysql_query($editQuery) or trigger_error(mysql_error());

			echo"$txt[53]";
        		echo"<script type='text/javascript'> <!-- window.status = ''; window.location = 'index.php?modul=newsedit';//--> </script>";
       		}

?>