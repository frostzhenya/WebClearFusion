<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: conf.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

$config =array (
//==================================================================
// База мира (mangos)
//==================================================================
'hostname' => '127.0.0.1',
'username' => 'mangos',
'password' => 'mangos',
'dbName' => 'mangos',

//==================================================================
// База сайта (WCF)
//==================================================================
'whostname' => '127.0.0.1',
'wusername' => 'mangos',
'wpassword' => 'mangos',
'wdbName' => 'wcf',

//==================================================================
// База реалм (realmd)
//==================================================================
'rhostname' => '127.0.0.1',
'rusername' => 'mangos',
'rpassword' => 'mangos',
'rdbName' =>'realmd',

//==================================================================
// База персанажей (characters)
//==================================================================
'chostname' => '127.0.0.1',
'cusername' => 'mangos',
'cpassword' => 'mangos',
'cdbName' =>'characters',

//==================================================================
// Прочие настройки (название, язык en\ru, кодировка utf8\cp1251)
//==================================================================
'servername'=>'Name WoW Server',
'lang'=>'ru',
'encoding'=> 'utf8',

//==================================================================
// Выбор темы по умолчанию (default)
//==================================================================
'theme'=>'default',
'admin'=>'3',
//==================================================================
// Ревизия и копирайт wcf (запрещается менять)
//==================================================================
'copyright'=>'WebClearFusion v 0.1.35 from LovePSone 2010-2011',
'revision'=>'wcf_revision_nr = [24]',
);

error_reporting(E_ERROR | E_PARSE | E_WARNING);
//error_reporting(E_ALL);
ini_set('display_errors', 0); //disable on production servers!

//==================================================================
// дальнейшая настройка в module/module_cfg.php
//==================================================================
include("module/module_cfg.php");
?>
