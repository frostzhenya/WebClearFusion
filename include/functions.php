<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: functions.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	$date = date('d-m-Y [H:i:s]');

	function selectdb($date_base)
		{
  			global $config;
  
  			switch ($date_base):

 			case ("mangos"):
  			$db = $config['dbName'];
  			$ip = $config['hostname'];
  			$userdb = $config['username'];
  			$pw = $config['password'];
  			break;
  
  			case ("realmd"):
  			$db = $config['rdbName'];
  			$ip = $config['rhostname'];
  			$userdb = $config['rusername'];
  			$pw = $config['rpassword'];
  			break;
  
  			case ("characters"):
  			$db = $config['cdbName'];
  			$ip = $config['chostname'];
  			$userdb = $config['cusername'];
  			$pw = $config['cpassword'];
  			break;
  
  			case ("wcf"):
  			$db = $config['wdbName'];
  			$ip = $config['whostname'];
  			$userdb = $config['wusername'];
  			$pw = $config['wpassword'];
  			break;
  
  			endswitch;
  
 			$connect = mysql_connect($ip, $userdb, $pw);
 			mysql_select_db($db, $connect);
			mysql_query("SET NAMES '".$config['encoding']."'");   
		}

	function getLocale($locale)
		{
  			switch ($locale):
      			case 0:
      			$locale = "English";
      			break;
  
    			case 1:
      			$locale = "Korean";
      			break;
    
    			case 2:
      			$locale = "French";
      			break;

    			case 3:
      			$locale = "German";
      			break;
      
    			case 4:
      			$locale = "Chinese";
      			break;
      
    			case 5:
      			$locale = "Taiwanese";
     			break;
      
    			case 6:
      			$locale = "Spanish";
      			break;
      
    			case 7:
      			$locale = "Spanish Mexico";
      			break;
      
    			case 8:
      			$locale = "�������";
      			break;

  			endswitch;

			return $locale;
  
		}

	if (isset($_SESSION['lang']))
		{
    			switch($_SESSION['lang'])
    			{
        			case "ru":
        			$config['lang'] = "ru";
        			break;
        			case "en":
        			$config['lang'] = "en";
        			break;
        			default:
        			unset($_SESSION['lang']);
       	 			break;
    			}
		}

	function generate($number)
		{
    			$arr = array('a','b','c','d','e','f',
                 	     	     'g','h','i','j','k','l',
                 	     	     'm','n','o','p','r','s',
                 	     	     't','u','v','x','y','z',
                 	     	     'A','B','C','D','E','F',
                 	     	     'G','H','I','J','K','L',
                 	     	     'M','N','O','P','R','S',
                 	     	     'T','U','V','X','Y','Z',
                 	     	     '1','2','3','4','5','6',
                 	     	     '7','8','9','0',);
   			$symbol = "";

   			for($i = 0; $i < $number; $i++)
				{
     					$index = rand(0, count($arr) - 1);
     					$symbol .= $arr[$index];
     				}
   			return $symbol;
		}

	function ShowPageNavigator($LinkText,$Page,$AllPages)
		{
			$Page = intval($Page);
			$AllPages = intval($AllPages);
			if ($Page > $AllPages) $Page = 1;
			$text ="<table border='0' cellpadding='5' cellspacing='3'><tr>";
			if ($AllPages < 16)
				{
   					for ($i = 1; $i <= $AllPages; $i++)
						{
       							if ($i == $Page)  $text .= "<td class=navicurrent>$i</td>";
       							else $text .= "<td class=navibutton><a href='$LinkText$i' target='_self'>$i</a></td>";
      						}
  				} 
			else
				{
    					if ($Page < 6)
						{
        						for ($i = 1; $i <= 6; $i++)
								{
            								if ($i == $Page)  $text .= "<td class=navicurrent>$i</td>";
            								else $text .= "<td class=navibutton><a href='$LinkText$i' target='_self'>$i</a></td>";
            							}
        						$text .= "<td>...</td>";
        						$text .= "<td class=navibutton><a href='$LinkText($AllPages-2)' target='_self'>($AllPages-2)</a></td>";
        						$text .= "<td class=navibutton><a href='$LinkText($AllPages-1)' target='_self'>($AllPages-1)</a></td>";
        						$text .= "<td class=navibutton><a href='$LinkText$AllPages' target='_self'>$AllPages</a></td>";
        					}

    					else if ($Page > ($AllPages-5))
						{
        						$text .= "<td class=navibutton><a href='$LinkText1' target='_self'>1</a></td>";
        						$text .= "<td class=navibutton><a href='$LinkText2' target='_self'>2</a></td>";
        						$text .= "<td class=navibutton><a href='$LinkText3' target='_self'>3</a></td>";
        						$text .= "<td>...</td>";

        						for ($i = ($AllPages-5); $i <= $AllPages; $i++)
								{
            								if ($i == $Page)  $text .= "<td class=navicurrent>$i</td>";
            								else $text .= "<td class=navibutton><a href='$LinkText$i' target='_self'>$i</a></td>";
            							}
        					}
    					else
						{
        						$text .= "<td class=navibutton><a href='$LinkText1' target='_self'>1</a></td>";
        						$text .= "<td class=navibutton><a href='$LinkText2' target='_self'>2</a></td>";
        						$text .= "<td class=navibutton><a href='$LinkText3' target='_self'>3</a></td>";
        						$text .= "<td>...</td>";
        						$text .= "<td class=navibutton><a href='$LinkText($Page-1)' target='_self'>($Page-1)</a></td>";
        						$text .= "<td class=navicurrent>$Page</td>";
        						$text .= "<td class=navibutton><a href='$LinkText($Page+1)' target='_self'>($Page+1)</a></td>";
        						$text .= "<td>...</td>";
        						$text .= "<td class=navibutton><a href='$LinkText($AllPages-2)' target='_self'>($AllPages-2)</a></td>";
        						$text .= "<td class=navibutton><a href='$LinkText($AllPages-1)' target='_self'>($AllPages-1)</a></td>";
        						$text .= "<td class=navibutton><a href='$LinkText$AllPages' target='_self'>$AllPages</a></td>";
        					}
  				}
			$text .= "</tr></table>";
			return $text;
		}

	function text_optimazer($Mstring)
		{
			$e = 0;
			$rString = trim($Mstring);
			$rString = AddSlashes($rString);
			$rString = trim($rString);

			while ($e < 50)
   				{
   					if ((substr($rString, -13) == '<p>&nbsp;</p>') && (strlen($rString) > 13))
      						{
       							$rString = substr($rString, 0, strlen($rString)-13);
       							$e++;
      						}
					else $e = 51;
   					$rString = rtrim($rString);
   				}

			$e = 0;

			while ($e < 50)
   				{
   					if ((substr($rString, 0, 13) == '<p>&nbsp;</p>') && (strlen($rString) > 13))
      						{
       							$rString = substr($rString, 13, strlen($rString)-13);
       							$e++;
      						}
					else $e = 51;
   					$rString = ltrim($rString);
   				}
			return trim($rString);
		}
	//===============================
	// ������� ���� �� ������������
	function panel_position($position)
		{
			selectdb(wcf);
  			$panels_position = mysql_query("SELECT `panel_id`, `panel_url`  FROM `wcf_panels` WHERE `panel_position`= '".$position."'") or trigger_error(mysql_error());
			$num = mysql_num_rows($panels_position);

			while($position = mysql_fetch_array($panels_position))
				{
					require $position['panel_url'];
					if ($num > 1) echo"<hr>";
				}
		}
	function admin_page($admin_page)
		{
			selectdb(wcf);
			$administration = mysql_query("SELECT * FROM `wcf_admin` WHERE `admin_page`='$admin_page'") or trigger_error(mysql_error());
					echo"<tr>";
			while ($page_contet = mysql_fetch_array($administration))
				{
					if ($page_contet['admin_colum'] == 1)
						{
							echo"<td width='25%' class='page'><a href='index.php?modul=".$page_contet['admin_link']."'><img src='administration/images/".$page_contet['admin_image']."' align='absmiddle'><br>".$page_contet['admin_title']."</td>";
						}
					if ($page_contet['admin_colum'] == 2)
						{
							echo"<td width='25%' class='page'><a href='index.php?modul=".$page_contet['admin_link']."'><img src='administration/images/".$page_contet['admin_image']."' align='absmiddle'><br>".$page_contet['admin_title']."</td>";
						}
					if ($page_contet['admin_colum'] == 3)
						{
							echo"<td width='25%' class='page'><a href='index.php?modul=".$page_contet['admin_link']."'><img src='administration/images/".$page_contet['admin_image']."' align='absmiddle'><br>".$page_contet['admin_title']."</td>";
						}
					if ($page_contet['admin_colum'] == 4)
						{
							echo"<td width='25%' class='page'><a href='index.php?modul=".$page_contet['admin_link']."'><img src='administration/images/".$page_contet['admin_image']."' align='absmiddle'><br>".$page_contet['admin_title']."</td>";
						}
				}
					echo"</tr>";
		}
?>