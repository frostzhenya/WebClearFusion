<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2012 lovepsone
+--------------------------------------------------------+
| Filename: include_auth.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	//======================================
	// �������� ������
	$CapchaInput = check_kcaptcha_enable();

	if (isset($_POST['auth_name']) && $_POST['auth_name'] != "") 
   		{
			$password = SHA1(strtoupper(addslashes($_POST['auth_name']).':'.addslashes($_POST['auth_pass'])));

			// wow content
			if ($config['type_server'] == '1' || $config['type_server'] == '2')
				{
					auth();
				}
			else
				{
					selectdb("wcf");
   					$result = db_query("SELECT * FROM ".DB_USERS." WHERE `user_name`='".strtoupper(addslashes($_POST['auth_name']))."' AND `user_sha_pass_hash` ='".$password."'");

		   			if ((db_num_rows($result) == 1) && ($CapchaInput == 1))
		      				{
							$data = db_assoc($result);
		       					$_SESSION['user_id'] = (int)$data['user_id'];
		       					$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		       					$_SESSION['user_name'] = strtoupper($_POST['auth_name']);
		       					$_SESSION['password'] = strtoupper($password);
							$_SESSION['gmlevel'] = (int)$data['user_gmlevel'];
		       					$_SESSION['lang'] = $config['lang'];
							unset($_SESSION['captcha_keystring']);
		       				}
				}
			redirect("http://".$_SERVER['HTTP_HOST']."/setuser.php?action=auth");
   		}
?>