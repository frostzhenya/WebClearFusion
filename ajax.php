<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2012 lovepsone
+--------------------------------------------------------+
| Filename: ajax.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	require_once "maincore.php";
	// Режим запроса
	$ajaxmode = 1;
	$ajax_modules['tip'] = CONTENT_WOW."include/ajax_tooltip.php";

	// Получаем имя первой переменной запроса
	$mode = $_SERVER["QUERY_STRING"];
	$pos  = strpos($mode, "=");
	$pos1 = strpos($mode, "&");
	if ($pos > $pos1 AND $pos1!=NULL) { $pos = $pos1; }
	if ($pos != NULL) { $mode = substr($mode, 0, $pos); }

	$ajax_module = @$ajax_modules[$mode];

	// Подключаем модуль если найден
	if ($ajax_module) { include($ajax_module); } else { echo "Module ($mode) error"; }
?>