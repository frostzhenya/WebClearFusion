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
			$result = @mysql_query($query);
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
			$result = @mysql_result($query, $row);
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

	function db_count($field, $table, $conditions = "")
		{
			$cond = ($conditions ? " WHERE ".$conditions : "");
			$result = @mysql_query("SELECT Count".$field." FROM ".$table.$cond);

			if (!$result)
				{
					echo mysql_error();
					return false;
				}
			else
				{
					$rows = mysql_result($result, 0);
					return $rows;
				}
		}

	//=============================================================================================
	// ������� �������� � ������, ��������� �� � ��.
	// �������� ���� mode � �������:
	// 0 - ������ (������� � ���� "note")
	// 1 - �����������
	// 2 - �������������� ������ (������)
	// 3 - �������������� ������ (������ �����)
	// 4 - ����� ������ (������)
	// 5 - ����� ������ (������)
	// 6 - ������� �� ������ ������� ���������
	// 7 - �������������� ���������
	// 8 - unlock ip
	// 9 - antierror

	function logs($log_account, $log_character, $log_mode, $log_email, $log_resultat, $log_note, $log_old_data)
		{
			global $_SERVER;
			if (($log_account == '') || ($log_account == 0))
				{
					$log_account = $_SESSION['user_id'];
				}
			if ($log_character == '')
				{
					$log_character = 0;
				}

			selectdb("wcf");
			db_query("INSERT ".DB_LOGS." (`ip`, `account`, `character`, `mode`, `email`, `resultat`, `note`, `old_data`)
				VALUES ('".$_SERVER['REMOTE_ADDR']."', ".$log_account.", ".$log_character.", ".$log_mode.", '".$log_email."', '".$log_resultat."', '".$log_note."', '".$log_old_data."')");

		}

?>