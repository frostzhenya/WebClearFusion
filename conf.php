<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2012 lovepsone
+--------------------------------------------------------+
| Filename: conf.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	$config_db_connect = array();
	$config = array();
	//==================================================================
	// ���� ����� (wcf)
	//==================================================================
	$config_db_connect['whostname'] = '127.0.0.1';
	$config_db_connect['wusername'] = 'mangos';
	$config_db_connect['wpassword'] = 'mangos';
	$config_db_connect['wdbname']= 'wcf';

	//==================================================================
	// encoding
	//==================================================================
	$config['encoding'] = 'utf8';
	$config['errors_reporting'] = '1';

	//==================================================================
	// debugs
	//==================================================================	
	$config['useDebug'] = false;
	$config['logLevel'] = 3;

	//==================================================================
	// ������� � �������� wcf (����������� ������)
	//==================================================================
	$config['copyright'] = 'WebClearFusion v 1.0.10 from LovePSone 2010-2011';
	$config['revision'] = 'wcf_revision_nr = [363]';
	$config['rev_admin'] = ' 1.00.00';

	define("DB_PREFIX", "wcf_");
?>