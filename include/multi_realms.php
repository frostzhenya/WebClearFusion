<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2012 lovepsone
+--------------------------------------------------------+
| Filename: multi_realms.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

//==================================================================
// ���� ���������� (characters) realmid = 1
//==================================================================
	$realms[1][chostname] = '127.0.0.1';
	$realms[1][cusername] = 'mangos';
	$realms[1][cpassword] = 'mangos';
	$realms[1][cdbName] = 'characters';

//==================================================================
// ���� ���� (mangos) realmid = 1
//==================================================================
	$realms[1][hostname] = '127.0.0.1';
	$realms[1][username] = 'mangos';
	$realms[1][password] = 'mangos';
	$realms[1][dbName] = 'mangos';

//==================================================================
// ���� ���������� (characters) realmid = 2
//==================================================================
	$realms[1][chostname] = '127.0.0.1';
	$realms[1][cusername] = 'root';
	$realms[1][cpassword] = '';
	$realms[1][cdbName] = '335_characters';

//==================================================================
// ���� ���� (mangos) realmid = 2
//==================================================================
	$realms[1][hostname] = '127.0.0.1';
	$realms[1][username] = 'root';
	$realms[1][password] = '';
	$realms[1][dbName] = '335_mangos';
?>