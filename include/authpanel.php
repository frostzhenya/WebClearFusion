<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: authpanel.php
| Author: lovepsone, ���_��WIN��
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	echo"<form method='POST'>";
  	echo"<table border='0' cellpadding='0' cellspacing='0' width='200'>";

  	echo"<tr><td height='30' align='left' valign='middle' class='LoginText'>$txt[2]:&nbsp;</td>";
	echo"<td height='30' align='right' valign='middle' class='LoginInput'><input type='text' name='auth_name' size='10'></td></tr>";

 	echo"<tr><td height='30' align='left' valign='middle' class='LoginText'>$txt[3]:&nbsp;</td>";
      	echo"<td height='30' align='right' valign='middle' class='LoginInput'><input type='password' name='auth_pass' size='10'></td></tr>";
	echo"<tr><td height='30' colspan='2' align='right' valign='middle' class='LoginButton'><input type='submit' value='$txt[4]'></td></tr>";

	selectDB('realmd');
  	$rip = 'no';   
  	$res = mysql_query("SELECT `ip` FROM `ip_banned` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."' LIMIT 1") or trigger_error(mysql_error());

  	if ($row = mysql_fetch_assoc($res)) $rip  = $row['ip'];
  	if ($rip != $_SERVER['REMOTE_ADDR'])
		{
     			echo"<tr><td height='30' colspan='2' align='left' valign='middle'><img src='images/admin.png' align='absmiddle'>&nbsp;&nbsp;&nbsp;<a href='index.php?modul=reg'>$txt[5]</a></td></tr>";

     		if (($PassRemember == 'on') AND ($mail_method != 'test'))
			{
     				echo"<tr><td height='30' colspan='2' align='left' valign='middle'><img src='images/letter.png' align='absmiddle'>&nbsp;&nbsp;&nbsp;<a href='index.php?modul=remember'>$txt[6]</a></td></tr>";
		   	}
     		}

	echo"</table></form>";
?>