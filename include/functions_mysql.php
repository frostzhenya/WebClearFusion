<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: functions_mysql.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	//=============================================================================================
	// ������� �������� � ���� 
	function selectdb($date_base)
		{
  			global $config_db_connect, $config;

  			switch ($date_base):

  			case ("wcf"):
				{
				  	$db = $config_db_connect['wdbname'];
				  	$ip = $config_db_connect['whostname'];
				  	$userdb = $config_db_connect['wusername'];
				  	$pw = $config_db_connect['wpassword'];
		  			break;
				}

  			endswitch;
  
 			$db_connect = @mysql_connect($ip, $userdb, $pw);
 			$db_select = @mysql_select_db($db, $db_connect);
			@mysql_query("SET NAMES '".$config['encoding']."'");

			if (!$db_connect)
				{
					die("<div style='text-align:center;'><strong>Unable to establish connection to MySQL</strong><br />".mysql_errno()." : ".mysql_error()."</div>");
				}
			elseif (!$db_select)
				{
					die("<div style='text-align:center;'><strong>Unable to select MySQL database</strong><br />".mysql_errno()." : ".mysql_error()."</div>");
				}
		}

	//=============================================================================================
	// MySQL database functions
	function db_query($query)
		{
			global $config;
			$result = @mysql_query($query);

			if (!$result)
				{
					$mysql_er = mysql_error();
					if (mysql_error() == "") { $mysql_er = 'unspecified error'; }
					$debugs = new WCFDebug($config);
					$debugs->writeSql('Errors: mysql_query: %s -> file: %s ', $mysql_er, WCF_SELF);
					return false;
				}
			else 
				{
					return $result;
				}
		}

	//=============================================================================================
	// ������� ���������� ���������� ����� � ������� 
	function db_num_rows($query)
		{
			$result = @mysql_num_rows($query);
			return $result;
		}

	//=============================================================================================
	// ������� ���������� ������������� ������ � ���������� �������� 
	function db_assoc($query)
		{
			global $config;
			$query_s = $query;
			$result = @mysql_fetch_assoc($query);
			if (!$result) 
				{
					echo mysql_error();
					return false;
				}
			else
				{
					return $result;
				}
		}

	//=============================================================================================
	// ������� ���������� ������ � ������������ ����� ���������� ������� 
	function db_array($query)
		{
			global $config;
			$result = @mysql_fetch_array($query);
			if (!$result) 
				{
					echo mysql_error();
					return false;
				}
			else
				{
					return $result;
				}
		}

	function db_result($query, $row)
		{
			global $config;
			$result = @mysql_result($query, $row);
			if (!$result)
				{
					$mysql_er = mysql_error();
					if (mysql_error() == "") { $mysql_er = 'unspecified error'; }
					$debugs = new WCFDebug($config);
					$debugs->writeSql('Errors: mysql_result: %s -> file: %s ', $mysql_er, WCF_SELF);
					return false;
				}
			else
				{
					return $result;
				}
		}

	function db_count($field, $table, $conditions = "")
		{
			global $config;
			$cond = ($conditions ? " WHERE ".$conditions : "");
			$result = @mysql_query("SELECT Count".$field." FROM ".$table.$cond);

			if (!$result)
				{
					$mysql_er = mysql_error();
					if (mysql_error() == "") { $mysql_er = 'unspecified error'; }
					$debugs = new WCFDebug($config);
					$debugs->writeSql('Errors: mysql_query_count: %s -> file: %s ', $mysql_er, WCF_SELF);
					return false;
				}
			else
				{
					$rows = mysql_result($result, 0);
					return $rows;
				}
		}
?>