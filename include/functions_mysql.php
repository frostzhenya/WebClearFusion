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

	$date = date('d-m-Y [H:i:s]');

	//=============================================================================================
	// ������� �������� � ���� 
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

	function logs($log_account,$log_character,$log_mode,$log_email,$log_resultat,$log_note,$log_old_data)
		{
			global $_SERVER;
			if (($log_account == '') OR ($log_account == 0))
				{
					$log_account = $_SESSION['user_id'];
				}
			if ($log_character == '')
				{
					$log_character = 0;
				}

			selectdb(wcf);
			db_query("INSERT ".DB_LOGS." (`ip`, `account`, `character`, `mode`, `email`, `resultat`, `note`, `old_data`)
				VALUES ('".$_SERVER['REMOTE_ADDR']."', ".$log_account.", ".$log_character.", ".$log_mode.", '".$log_email."', '".$log_resultat."', '".$log_note."', '".$log_old_data."')");

		}

?>