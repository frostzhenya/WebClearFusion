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

	$config['use_tab_mode'] = '1';          // Tabbed report mode (cswowd)
	$config['talent_calc_max_level'] = '80';
	$config['errors_reporting'] = '1';
	
	//==================================================================
	// ��� wcf: 0 - �������,
	// 1 - ��������� World of Warcraft LK(mangos)
	// 2 - ��������� World of Warcraft LK(trynity)
	//==================================================================
	$config['type_server'] = '1';
	
	//==================================================================
	// ������� � �������� wcf (����������� ������)
	//==================================================================
	$config['copyright'] = 'WebClearFusion v 0.4.63 from LovePSone 2010-2011';
	$config['revision'] = 'wcf_revision_nr = [305]';
	$config['rev_admin'] = ' 0.02.00';
	$config['rev_acp'] = ' 0.02.00';

	define("DB_PREFIX", "wcf_");
?>