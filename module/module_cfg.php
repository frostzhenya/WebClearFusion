﻿<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: module_cfg.php
| Author: lovepsone, Кот_ДаWINчи
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

//==================================================================
// Здесь подключаются модули и выставляются их настройки
// default - Модуль подключаемый по умолчанию
// login -  Правое меню (в зависимости jn сессии)
//==================================================================

$modules  = array (
//       modul                path                            Name    Access  Admin Menu
	'default'  => array ('module/online/online.php',      257,     -1,     3,   0  ),  
	'login'    => array ('include/authpanel.php',         257,     -1,     3,   0  ),
);

//==================================================================
// Вкл\Выкл (on\off) Модуль востоновления пороля
//==================================================================
$config['pass_remember'] = 'on';
?>