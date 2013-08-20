<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2012 lovepsone
+--------------------------------------------------------+
| Filename: functions_theme.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	//=============================================================================================
	// ������� ��������� ������ �� ��������� ���������, ������������ � ����������
	function CheckPanelStatus($side)
	{
		global $config;

		$exclude_list = "";
	
		if ($side == "left")
		{
			if ($config['exclude_left'] != "") { $exclude_list = explode("\r\n", $config['exclude_left']); }
		}
		elseif ($side == "upper")
		{
			if ($config['exclude_upper'] != "") { $exclude_list = explode("\r\n", $config['exclude_upper']); }
		}
		elseif ($side == "lower")
		{
			if ($config['exclude_lower'] != "") { $exclude_list = explode("\r\n", $config['exclude_lower']); }
		}
		elseif ($side == "right")
		{
			if ($config['exclude_right'] != "") { $exclude_list = explode("\r\n", $config['exclude_right']); }
		}
	
		if (is_array($exclude_list))
		{
			$script_url = explode("/", $_SERVER['PHP_SELF']);
			$url_count = count($script_url);
			$base_url_count = substr_count(BASEDIR, "/")+1;
			$match_url = "";

			while ($base_url_count != 0)
			{
				$current = $url_count - $base_url_count;
				$match_url .= "/".$script_url[$current];
				$base_url_count--;
			}

			if (!in_array($match_url, $exclude_list) && !in_array($match_url.(WCF_QUERY ? "?".WCF_QUERY : ""), $exclude_list))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
		return true;
		}
	}

	//=============================================================================================
	// ������� ��� ������ ������
	function showbanners()
	{
		global $config;
		ob_start();

		if ($config['serverbanner'])
		{
			echo "<a href='".$config['serverurl']."'><img src='".BASEDIR.$config['serverbanner']."' alt='".$config['servername']."' style='border: 0;' /></a>\n";
		}
		else
		{
			echo "<a href='".$config['serverurl']."'>".$config['servername']."</a>\n";
		}
	
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}

	//=============================================================================================
	// ������� ��� ��������� ������� �� ������ ���� wc
	function IncludePanelWC($modules, $mlist, $pname)
	{
		for ($i=1;$i <= count($modules);$i++)
		{
			$patch_p[$i] = $modules[$mlist[$i]]."/panels/";
			if (file_exists($patch_p[$i].$pname."/".$pname.".php"))
			{
				$pfile = $patch_p[$i].$pname."/".$pname.".php";
				break;
			}
		}
		if (file_exists($pfile))
		{
			return $pfile;
		}
		else
		{
			return false;
		}
	}

	function CheckPanelDisplay()
	{
		global $config;

		if (CheckPanelStatus("left"))
		{
			$p_sql = "panel_side='1'";
		}
		if (CheckPanelStatus("upper"))
		{
			$p_sql .= ($p_sql ? " OR " : "");
			$p_sql .= ($config['opening_page'] != START_PAGE ? "(panel_side='2' AND panel_display='1')" : "panel_side='2'");
		}
		if (CheckPanelStatus("lower"))
		{
			$p_sql .= ($p_sql ? " OR " : "");
			$p_sql .= ($config['opening_page'] != START_PAGE ? "(panel_side='3' AND panel_display='1')" : "panel_side='3'");
		}
		if (CheckPanelStatus("right"))
		{
			$p_sql .= ($p_sql ? " OR " : "")."panel_side='4'";
		}

		return ($p_sql ? " AND (".$p_sql.")" : false);
	}

	function CheckModulePanelDisplay($modules, $module_list)
	{
		// ���������� ���� � ������ �������, � ������� � ������ ��� �������� ������� ���� wc
		selectdb("wcf");
		$list_p = array(); $list_m = array();
		for ($i=1;$i <= count($modules);$i++)
		{
			$patch_p[$i] = $modules[$module_list[$i]]."/panels/";
			$temp_p = opendir($patch_p[$i]);
			while ($folder_p = readdir($temp_p))
			{
				if ((!in_array($folder_p, array(".","..")) && strstr($folder_p, "_panel_wc")))
				{
					$result = db_query("SELECT * FROM ".DB_PANELS." WHERE `panel_filename`='".$folder_p."'");
					if (is_dir($patch_p[$i].$folder_p) && db_num_rows($result) != 1)
					{
						$list_m[] = $folder_p;
					}
				}
			}
			closedir($temp_p);
			if (count($list_m) != 0)
			{
				sort($list_m);
				$list_p[$i] = $list_m;
			}
		}
		return $list_p;
	}
?>