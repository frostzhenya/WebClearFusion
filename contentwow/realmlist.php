<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: realmlist.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	//==================================================================
	// ���� ����� (realmd)
	//==================================================================
	$config_db_connect['rhostname'] = '127.0.0.1';
	$config_db_connect['rusername'] = 'mangos';
	$config_db_connect['rpassword'] = 'mangos';
	$config_db_connect['rdbname'] = 'realmd';

	$realms = array();
	//==================================================================
	// ���� ���� (mangos[1])
	//==================================================================
	$realms[1]['hostname'] = '127.0.0.1';
	$realms[1]['username'] = 'mangos';
	$realms[1]['password'] = 'mangos';
	$realms[1]['dbname'] = 'mangos';
	
	//==================================================================
	// ���� ���������� (characters[1])
	//==================================================================
	$realms[1]['chostname'] = '127.0.0.1';
	$realms[1]['cusername'] = 'mangos';
	$realms[1]['cpassword'] = 'mangos';
	$realms[1]['cdbname'] = 'characters';
	
	//==================================================================
	// ���� ���� (mangos[2])
	//==================================================================
	$realms[2]['hostname'] = '127.0.0.1';
	$realms[2]['username'] = 'mangos';
	$realms[2]['password'] = 'mangos';
	$realms[2]['dbname'] = 'mangos2';
	
	//==================================================================
	// ���� ���������� (characters[2])
	//==================================================================
	$realms[2]['chostname'] = '127.0.0.1';
	$realms[2]['cusername'] = 'mangos';
	$realms[2]['cpassword'] = 'mangos';
	$realms[2]['cdbname'] = 'characters2';
?>