<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: rightform.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	if (!isset($_SESSION['user_id']) or ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']))
		{
			echo"<table width='200' border='0' cellspacing='0' cellpadding='3'>";
			echo"<tr><td align='center' class='menutext'>$txt[menu_auth_title]</td></tr>"; 
			echo"</table><br><br>";

			echo"<form method='POST'>";
  			echo"<table border='0' cellpadding='0' cellspacing='0' width='100%'>";

  			echo"<tr><td width='50%' height='30' align='left' valign='middle' class='logintext'>$txt[menu_auth_account]:&nbsp;</td>";
			echo"<td width='50%' height='30' align='left' valign='middle' class='logininput'><input type='text' name='auth_name' size='10'></td></tr>";

 			echo"<tr><td width='50%' height='30' align='left' valign='middle' class='logintext'>$txt[menu_auth_pass]:&nbsp;</td>";
      			echo"<td width='50%' height='30' align='left' valign='middle' class='logininput'><input type='password' name='auth_pass' size='10'></td></tr>";
			echo"<tr><td width='50%' height='30' colspan='2' align='center' valign='middle' class='loginbutton'><input type='submit' value='$txt[menu_auth_enter]'></td></tr>";
  			$rip = 'no';

 			$r_connect = mysql_connect($config['rhostname'], $config['rusername'], $config['rpassword']);
			mysql_select_db($config['rdbName'], $r_connect);
			mysql_query("SET NAMES '".$config['encoding']."'");

  			$res = mysql_query("SELECT `ip` FROM `ip_banned` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."' LIMIT 1") or trigger_error(mysql_error());

  			if ($row = mysql_fetch_assoc($res)) $rip  = $row['ip'];
  			if ($rip != $_SERVER['REMOTE_ADDR'])
				{
     					echo"<tr><td height='30' colspan='2' align='left' valign='middle' class='logintext'><img src='images/admin.png' align='absmiddle'>&nbsp;&nbsp;&nbsp;<a href='index.php?modul=reg'>$txt[menu_auth_reg]</a></td></tr>";

     						if (($config['pass_remember'] == 'on') AND ($mail_method != 'test'))
							{
     								echo"<tr><td height='30' colspan='2' align='left' valign='middle' class='logintext'><img src='images/mail.png' align='absmiddle'>&nbsp;&nbsp;&nbsp;<a href='index.php?modul=remember'>$txt[menu_auth_remember_pass]</a></td></tr>";
		   					}
     				}

			echo"</table></form>";
		}
	else 
		{
  			$rip = '';

 			$r_connect = mysql_connect($config['rhostname'], $config['rusername'], $config['rpassword']);
			mysql_select_db($config['rdbName'], $r_connect);
			mysql_query("SET NAMES '".$config['encoding']."'");

  			$query0 = "SELECT `ip` FROM `ip_banned` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."' LIMIT 1";
 			$res0 = mysql_query($query0);

  			if ($row0 = mysql_fetch_assoc($res0)) $rip  = $row0['ip'];
  			$query = "SELECT * FROM `account` WHERE `id`=".$_SESSION['user_id']." LIMIT 1";
  			$res = mysql_query($query) or trigger_error(mysql_error().$query);

  			if ($row = mysql_fetch_assoc($res)) 
      				{
       					$ra_id             = $row['id'];
       					$ra_username  = $row['username'];
       					$ra_gmlevel     = $txt[70+$row['gmlevel']];
					$ra_admin     = $row['gmlevel'];
       					$ra_email        = $row['email'];
       					$ra_joindate    = $row['joindate'];
       					$ra_last_ip      = $row['last_ip'];
       					$ra_locked      = $row['locked'];
       					$ra_last_login  = $row['last_login'];
       					$ra_online       = $row['active_realm_id'];
       					//$ra_expansion  = getExpansion($row['expansion']);
       					$ra_locale        = getlocale($row['locale']);
      				}

   			if (strtoupper($_SESSION['slovo']) != strtoupper($row['sha_pass_hash']) ) 
     				{
      					session_destroy();
      					echo"<table width='200' border='0' cellspacing='0' cellpadding='0'>";
      					echo"<tr><td height='25' align='center' valign='middle' class='errtitle'><b>$txt[menu_auth_error]</b></td></tr>";
					echo"<tr><td height='45' align='center' valign='middle'  class='errtab'><b>$txt[menu_auth_re_enter]</b></td></tr>";
					echo"</table><br><br>";
      					ReturnMainForm(40);
      					return;
     				}

			$r_connect = mysql_connect($config['rhostname'], $config['rusername'], $config['rpassword']);
			mysql_select_db($config['rdbName'], $r_connect);
			mysql_query("SET NAMES '".$config['encoding']."'");

  			$query2 = "SELECT `active` FROM `account_banned` WHERE `id`='".$ra_id."' LIMIT 1";
  			$res2 = mysql_query($query2) or trigger_error(mysql_error());

  			if ($row2 = mysql_fetch_assoc($res2)) $r_act  = $row2['active'];
  			else $r_act = '0';

  			echo"<table width='200' border='0' cellspacing='0' cellpadding='3' class='panel-right'>";

  			echo"<tr><td align='left' valign='top' class='paneltitle'>$txt[menu_auth_account]</td></tr>";
  			echo"<tr><td align='left' valign='bottom' class='paneldata'>".ucfirst(strtolower($ra_username))."</td></tr>";
  			echo"<tr><td align='left' valign='top' class='paneltitle'>$txt[menu_auth_e_mail]</td></tr>";
  			echo"<tr><td align='left' valign='bottom' class='paneldata'>$ra_email</td></tr>";

  			echo"<tr><td align='left' valign='top' class='paneltitle'>$txt[menu_auth_ip]</td></tr>";
  			echo"<tr><td align='left' valign='bottom' class='paneldata'>".$_SERVER['REMOTE_ADDR']."</td></tr>";

			echo"<tr><td width='100%' valign='bottom'><hr></td></tr>";
			if ( $ra_admin >= $config['admin'] ) { echo"<tr><td align='right' valign='bottom' class='paneldata'><a href='index.php?modul=newscreate'>$txt[menu_auth_admin]</a></td></tr>";}
			echo"<tr><td align='right' valign='bottom' class='paneldata'><a href='index.php?modul=logout'>$txt[menu_auth_exit]</a></td></tr></table>";
		}
?>