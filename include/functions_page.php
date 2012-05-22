<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2012 lovepsone
+--------------------------------------------------------+
| Filename: functions_page.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	//=============================================================================================
	// �������, ������������ ������
	function display_access_form($access)
		{
			global $txt;
			if ($access == -1) { return $txt['genl']; }
			else if ($access == 0) { return $txt['user']; }
			else if ($access == 1) { return $txt['moderator']; }
			else if ($access == 2) { return $txt['vebmaster']; }
			else if ($access == 3) { return $txt['administrator']; }
			else if ($access == 4) { return $txt['superadministrator']; }
			else { return false; }
		}

	//=============================================================================================
	// �������, ��������� ���������
	function show_page($LinkText,$Page,$AllPages)
		{
			$Page = intval($Page);
			$AllPages = intval($AllPages);
			if ($Page > $AllPages) $Page = 1;
			$text ="<table border='0' cellpadding='5' cellspacing='3'><tr>";
			if ($AllPages < 16)
				{
   					for ($i = 1; $i <= $AllPages; $i++)
						{
       							if ($i == $Page)  $text .= "<td>$i</td>";
       							else $text .= "<td><a href='$LinkText$i' target='_self'>$i</a></td>";
      						}
  				} 
			else
				{
    					if ($Page < 6)
						{
        						for ($i = 1; $i <= 6; $i++)
								{
            								if ($i == $Page)  $text .= "<td>$i</td>";
            								else $text .= "<td><a href='$LinkText$i' target='_self'>$i</a></td>";
            							}
        						$text .= "<td>...</td>";
        						$text .= "<td><a href='$LinkText($AllPages-2)' target='_self'>($AllPages-2)</a></td>";
        						$text .= "<td><a href='$LinkText($AllPages-1)' target='_self'>($AllPages-1)</a></td>";
        						$text .= "<td><a href='$LinkText$AllPages' target='_self'>$AllPages</a></td>";
        					}

    					else if ($Page > ($AllPages-5))
						{
        						$text .= "<td><a href='$LinkText1' target='_self'>1</a></td>";
        						$text .= "<td><a href='$LinkText2' target='_self'>2</a></td>";
        						$text .= "<td><a href='$LinkText3' target='_self'>3</a></td>";
        						$text .= "<td>...</td>";

        						for ($i = ($AllPages-5); $i <= $AllPages; $i++)
								{
            								if ($i == $Page)  $text .= "<td>$i</td>";
            								else $text .= "<td><a href='$LinkText$i' target='_self'>$i</a></td>";
            							}
        					}
    					else
						{
        						$text .= "<td><a href='$LinkText1' target='_self'>1</a></td>";
        						$text .= "<td><a href='$LinkText2' target='_self'>2</a></td>";
        						$text .= "<td><a href='$LinkText3' target='_self'>3</a></td>";
        						$text .= "<td>...</td>";
        						$text .= "<td><a href='$LinkText($Page-1)' target='_self'>($Page-1)</a></td>";
        						$text .= "<td>$Page</td>";
        						$text .= "<td><a href='$LinkText($Page+1)' target='_self'>($Page+1)</a></td>";
        						$text .= "<td>...</td>";
        						$text .= "<td><a href='$LinkText($AllPages-2)' target='_self'>($AllPages-2)</a></td>";
        						$text .= "<td><a href='$LinkText($AllPages-1)' target='_self'>($AllPages-1)</a></td>";
        						$text .= "<td><a href='$LinkText$AllPages' target='_self'>$AllPages</a></td>";
        					}
  				}
			$text .= "</tr></table>";
			return $text;
		}

	//=============================================================================================
	// �������, ��������� �������, ����� ������ �� �������
	function admin_page($page,$string,$list)
		{
			global $txt;
			echo"<tr>";
			reset($list);
			while (list($id, $data) = each($list))
				{
					if ($data[0] == 1 && $data[1] == $page && $data[2] == $string)
						{
							echo"<td width='25%' align='center'>";
							echo"<a href='".ADMIN.$data[5]."'>";
							echo"<img src='".ADMIN."images/".$data[3]."' align='absmiddle'>";
							echo"<br>".$txt[$data[4]]."</td>";
						}
					if ($data[0] == 2 && $data[1] == $page && $data[2] == $string)
						{
							echo"<td width='25%' align='center'>";
							echo"<a href='".ADMIN.$data[5]."'>";
							echo"<img src='".ADMIN."images/".$data[3]."' align='absmiddle'>";
							echo"<br>".$txt[$data[4]]."</td>";
						}
					if ($data[0] == 3 && $data[1] == $page && $data[2] == $string)
						{
							echo"<td width='25%' align='center'>";
							echo"<a href='".ADMIN.$data[5]."'>";
							echo"<img src='".ADMIN."images/".$data[3]."' align='absmiddle'>";
							echo"<br>".$txt[$data[4]]."</td>";
						}
					if ($data[0] == 4 && $data[1] == $page && $data[2] == $string)
						{
							echo"<td width='25%' align='center'>";
							echo"<a href='".ADMIN.$data[5]."'>";
							echo"<img src='".ADMIN."images/".$data[3]."' align='absmiddle'>";
							echo"<br>".$txt[$data[4]]."</td>";
						}
					if ($data[0] == 5 && $data[1] == $page && $data[2] == $string)
						{
						// ����� ��������� �������
						}
				}
					echo"</tr>";
		}

	//=============================================================================================
	// ������� ���������� ����� (��������)
	function return_form($Retime,$url)
		{
			echo"<script type='text/javascript'> <!--
			function exec_refresh()
				{
  					window.status = 'reloading...' + myvar;
  					myvar = myvar + ' .';
  					var timerID = setTimeout('exec_refresh();', 100);
  					if (timeout > 0)
						{
							timeout -= 1;
						}
					else
						{
    							clearTimeout(timerID);
    							window.status = '';
    							window.location = '$url';
    						}
				}
			var myvar = '';
			var timeout = '".$Retime."';
			exec_refresh();
			//--> </script>";
		}
?>