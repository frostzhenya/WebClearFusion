<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: log.php
| Author: ���_��WIN��, lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	$w_connect = mysql_connect($config['whostname'], $config['wusername'], $config['wpassword']);

	if (($log_account == '') OR ($log_account == 0)) {$log_account = $_SESSION['user_id']; }
	if ($log_character == '') { $log_character = 0; }

	mysql_select_db($config['wdbName'], $w_connect);
	mysql_query("SET NAMES '".$config['encoding']."'");

	mysql_query("insert `wcf_logs` (`ip`, `account`, `character`, `mode`, `email`, `resultat`, `note`, `old_data`) values ('".$_SERVER['REMOTE_ADDR']."', ".$log_account.", ".$log_character.", ".$log_mode.", '".$log_email."', '".$log_resultat."', '".$log_note."', '".$log_old_data."')");
	echo"<br><br>";


/*-------------------------------------------------------+
| 
| (ru) �������� ���� mode:
| 0 - ������ (������� � ���� "note")
| 1 - �����������
| 2 - �������������� ������ (������)
| 3 - �������������� ������ (������ �����)
| 4 - ����� ������ (������)
| 5 - ����� ������ (������)
| 6 - ������� �� ������ ������� ���������
| 7 - �������������� ���������
| 8 - unlock ip
| 9 - antierror
|
| (en)value of the field mode:
| 0 - other (specified in the "note")
| 1 - Registration
| 2 - password recovery (request)
| 3 - Password Recovery (sent new)
| 4 - change an e-mail (request)
| 5 - change an e-mail (Replacement)
| 6 - Transfer to another account of the character
| 7 - to rename your character
| 8 - unlock ip
| 9 - antierror
|
+--------------------------------------------------------*/
?>