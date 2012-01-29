<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2012 lovepsone
+--------------------------------------------------------+
| Filename: forumedit.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	require_once "../maincore.php";
	require_once THEMES."templates/admin_header.php";

	//======================================================
	// ���������� ������� ������
	if ((isset($_GET['type']) && $_GET['type'] == "sections") & (isset($_GET['action']) && $_GET['action'] == "mu") & isset($_GET['order']) & isset($_GET['forum_id']))
		{
			selectdb(wcf);
  			$data = db_array(db_query("SELECT `forum_id` FROM ".DB_FORUMS." WHERE `forum_sections`='0' AND `forum_order`='".$_GET['order']."'"));
			$result = db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order+1 WHERE `forum_id`='".$data['forum_id']."'");
			$result = db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order-1 WHERE `forum_id`='".$_GET['forum_id']."'");
			redirect(WCF_SELF);
		}
	elseif ((isset($_GET['type']) && $_GET['type'] == "sections") & (isset($_GET['action']) && $_GET['action'] == "md") & isset($_GET['order']) & isset($_GET['forum_id']))
		{
			selectdb(wcf);
			$data = db_array(db_query("SELECT `forum_id` FROM ".DB_FORUMS." WHERE `forum_sections`='0' AND `forum_order`='".$_GET['order']."'"));
			$result = db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order-1 WHERE `forum_id`='".$data['forum_id']."'");
			$result = db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order+1 WHERE `forum_id`='".$_GET['forum_id']."'");
			redirect(WCF_SELF);
		}
	elseif ((isset($_GET['type']) && $_GET['type'] == "forum") & (isset($_GET['action']) && $_GET['action'] == "mu") & isset($_GET['order']) & isset($_GET['forum_id']) & isset($_GET['sections']))
		{
			selectdb(wcf);
			$data = db_array(db_query("SELECT `forum_id` FROM ".DB_FORUMS." WHERE `forum_sections`='".$_GET['sections']."' AND `forum_order`='".$_GET['order']."'"));
			$result = db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order+1 WHERE `forum_id`='".$data['forum_id']."'");
			$result = db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order-1 WHERE `forum_id`='".$_GET['forum_id']."'");
			redirect(WCF_SELF);
		}
	elseif ((isset($_GET['type']) && $_GET['type'] == "forum") & (isset($_GET['action']) && $_GET['action'] == "md") & isset($_GET['order']) & isset($_GET['forum_id']) & isset($_GET['sections']))
		{
			selectdb(wcf);
			$data = db_array(db_query("SELECT `forum_id` FROM ".DB_FORUMS." WHERE `forum_sections`='".$_GET['sections']."' AND `forum_order`='".$_GET['order']."'"));
			$result = db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order-1 WHERE `forum_id`='".$data['forum_id']."'");
			$result = db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order+1 WHERE `forum_id`='".$_GET['forum_id']."'");
			redirect(WCF_SELF);
		}
	//======================================================
	// ��� ��� ������� � ��������� �������� � �������
	elseif (!isset($_GET['action']) AND !isset($_GET['type']))
		{
			//======================================================
			// �������� ��������
			if (isset($_POST['save_sections'])  AND $_POST['sections_name'] != "" AND $_POST['sections_order'] != "")
				{
					selectdb(wcf);
					$result = db_query("SELECT `forum_id` FROM ".DB_FORUMS." WHERE `forum_sections`='0' AND `forum_order`='".$_POST['sections_order']."'");
					$data_create = db_array($result);

					if (db_num_rows($result) != 0)
						{
							db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order+1 WHERE `forum_sections`='0' AND `forum_order`>='".$_POST['sections_order']."'");
							db_query("INSERT INTO ".DB_FORUMS." (`forum_sections`,`forum_order`,`forum_name`) VALUES ('0','".$_POST['sections_order']."','".$_POST['sections_name']."')");
						}
					else
						{
							db_query("INSERT INTO ".DB_FORUMS." (`forum_sections`,`forum_order`,`forum_name`) VALUES ('0','".$_POST['sections_order']."','".$_POST['sections_name']."')");
						}
					redirect(WCF_SELF);
				}
			//======================================================
			// �������� �������
			elseif (isset($_POST['save_forum']) AND $_POST['forum_name'] != "" AND $_POST['forum_order'] != "")
				{
					selectdb(wcf);
					$result = db_query("SELECT `forum_id` FROM ".DB_FORUMS." WHERE `forum_sections`='".$_POST['forum_sections']."' AND `forum_order`='".$_POST['forum_order']."'");
					$data_create = db_array($result);

					if (db_num_rows($result) != 0)
						{
							db_query("UPDATE ".DB_FORUMS." SET `forum_order`=forum_order+1 WHERE `forum_sections`='".$_POST['forum_sections']."' AND `forum_order`>='".$_POST['forum_order']."'");
							db_query("INSERT INTO ".DB_FORUMS." (`forum_sections`,`forum_order`,`forum_name`,`forum_description`) VALUES ('".$_POST['forum_sections']."','".$_POST['forum_order']."','".$_POST['forum_name']."','".$_POST['forum_description']."')");
						}
					else
						{
							db_query("INSERT INTO ".DB_FORUMS." (`forum_sections`,`forum_order`,`forum_name`,`forum_description`) VALUES ('".$_POST['forum_sections']."','".$_POST['forum_order']."','".$_POST['forum_name']."','".$_POST['forum_description']."')");
						}
					redirect(WCF_SELF);
				}
			elseif ((isset($_POST['save_sections']) AND ($_POST['sections_name'] == "" OR $_POST['sections_order'] == "")) OR (isset($_POST['save_forum']) AND ($_POST['forum_name'] == "" OR $_POST['forum_order'] == "")))
				{
					opentable();
					echo"<tr><td align='center'>".$txt['fill_field']."</td></tr>";
					return_form(20,WCF_SELF);
					closetable();
				}
		}
	//======================================================
	// ��� ��� ������� � ��������������� �������� � �������
	elseif ((isset($_GET['action']) && $_GET['action'] == "edit") && isset($_GET['forum_id']))
		{
			//======================================================
			// �������������� ��������
			if (isset($_GET['type']) && $_GET['type'] == "sections")
				{
					selectdb(wcf);
					$result = db_query("SELECT * FROM ".DB_FORUMS." WHERE `forum_id`='".$_GET['forum_id']."'");
					if (db_num_rows($result))
						{
							$data = db_array($result);
							$sections_title = $txt['admin_forumedit_edit_f_s'];
							$sections_name = $data['forum_name'];
						}
					if (isset($_POST['save_sections']) AND $_POST['sections_name'] != "")
						{
							selectdb(wcf);
							$result = db_query("UPDATE ".DB_FORUMS." SET `forum_name`='".$_POST['sections_name']."' WHERE (`forum_id`='".$_GET['forum_id']."')");

							if ($result)
								{
									redirect(WCF_SELF);
								}
							else
								{
									opentable();
									echo"<tr><td align='center'>".$txt['errors']."</td></tr>";
									return_form(20,WCF_SELF);
									closetable();
								}
						}
					elseif (isset($_POST['save_sections']) AND $_POST['sections_name'] == "")
						{
							opentable();
							echo"<tr><td align='center'>".$txt['fill_field']."</td></tr>";
							closetable();
							return_form(20,WCF_SELF.'type=sections&action=edit&forum_id='.$_GET['forum_id']);
						}
				}
			//======================================================
			// �������������� �������
			elseif (isset($_GET['type']) && $_GET['type'] == "forum")
				{
					selectdb(wcf);
					$result = db_query("SELECT * FROM ".DB_FORUMS." WHERE `forum_id`='".$_GET['forum_id']."'");
					if (db_num_rows($result))
						{
							$data = db_array($result);
							$forum_title = $txt['admin_forumedit_edit_f_f'];
							$forum_name = $data['forum_name'];
							$forum_description = $data['forum_description'];
						}
					if (isset($_POST['save_forum']) AND $_POST['forum_name'] != "")
						{
							selectdb(wcf);
							$result = db_query("UPDATE ".DB_FORUMS." SET `forum_sections`='".(int)$_POST['forum_sections']."', `forum_name`='".$_POST['forum_name']."', `forum_description`='".$_POST['forum_description']."'  WHERE (`forum_id`='".$_GET['forum_id']."')");

							if ($result)
								{
									redirect(WCF_SELF);
								}
							else
								{
									opentable();
									echo"<tr><td align='center'>".$txt['errors']."</td></tr>";
									closetable();
									return_form(20,WCF_SELF);
								}
						}
					elseif (isset($_POST['save_forum']) AND $_POST['forum_name'] == "")
						{
							opentable();
							echo"<tr><td align='center'>".$txt['fill_field']."</td></tr>";
							return_form(10,WCF_SELF.'?type=forum&action=edit&forum_id='.$_GET['forum_id']);
							closetable();
						}
				}
		}
	//======================================================
	// ��� ��� ������� � ��������� �������� � �������
	elseif ((isset($_GET['action']) && $_GET['action'] == "delete") && isset($_GET['forum_id']))
		{

			echo"<form method='post'>";
			opentable();
			echo"<tr><td align='center' colspan='2'>".$txt['admin_forumedit_delete']."</td></tr>";
			echo"<tr><td align='right' width='50%'><input type='submit' name='yes' value='".$txt['yes']."' class='button' /></td>";
			echo"<td align='left' width='50%'><input type='submit' name='no' value='".$txt['no']."' class='button' /></td></tr>";
			closetable();
			echo"</form>";

			if (isset($_POST['yes']))
				{
					selectdb(wcf);
					db_query("DELETE FROM ".DB_FORUMS." WHERE `forum_id`='".$_GET['forum_id']."'");
					db_query("DELETE FROM ".DB_FORUMS_POSTS." WHERE `forum_id`='".$_GET['forum_id']."'");
					db_query("DELETE FROM ".DB_FORUMS_THREADS." WHERE `forum_id`='".$_GET['forum_id']."'");
					redirect(WCF_SELF);
				}
			elseif (isset($_POST['no']))
				{
					redirect(WCF_SELF);
				}	
		}
	else
		{
			$sections_name = "";
			$sections_title = $txt['admin_forumedit_add_f_s'];
			$forum_name = "";
			$forum_description = "";
			$forum_title = $txt['admin_forumedit_add_f_f'];
		}
	//======================================================
	// 1-� ����� ������� � ���������
	if (!isset($_GET['type']) || $_GET['type'] != "forum" && $_GET['action'] != "delete")
		{
			opentable();
			echo"<form method='post'>";
			echo"<tr><td align='center' colspan='2' class='small'>".$sections_title."</td></tr>";
			echo"<tr><td width='50%' align='right' class='small2'>".$txt['admin_forumedit_name_f_s']."&nbsp;</td>";
			echo"<td width='50%' align='left' class='small2'><input type='text' name='sections_name' value='".$sections_name."' class='textbox' style='width:230px;'/></td></tr>";
			echo"<tr><td width='50%' align='right' class='small2'>";

			if (!isset($_GET['action']) || $_GET['action'] != "edit")
					{
						echo $txt['admin_forumedit_order_f_s']."&nbsp;</td>";
						echo"<td width='50%' align='left' class='small2'><input type='text' name='sections_order' class='textbox' style='width:45px;' />";
					}
			echo"</td></tr>";
			echo"<tr><td align='center' colspan='2'><input type='submit' name='save_sections' value='".$txt['admin_forumedit_savesect']."' class='button' /></td></tr>";
			echo"</form>";
			closetable();
		}

	//======================================================
	// 2-� ����� ������ � ��������
	if (!isset($_GET['type']) || $_GET['type'] != "sections" && $_GET['action'] != "delete")
		{
			$forum_opts = "";

			selectdb(wcf);
			$result2 = db_query("SELECT * FROM ".DB_FORUMS." WHERE `forum_sections`='0' ORDER BY `forum_order`");

			if (db_num_rows($result2))
				{
					while ($data2 = db_array($result2))
						{
							$forum_opts .= "<option value='".$data2['forum_id']."'>".$data2['forum_name']."</option>";
						}

					opentable();
					echo"<form method='post'>";
					echo"<tr><td align='center' colspan='2' class='small'>".$forum_title."</td></tr>";

					echo"<tr><td width='50%' align='right' class='small2'>".$txt['admin_forumedit_name_f_f']."&nbsp;</td>";
					echo"<td width='50%' align='left' class='small2'><input type='text' name='forum_name' value='".$forum_name."' class='textbox' style='width:230px;'/></td></tr>";

					echo"<tr><td width='50%' align='right' class='small2'>".$txt['admin_forumedit_descript_f_f']."&nbsp;</td>";
					echo"<td width='50%' align='left' class='small2'><input type='text' name='forum_description' value='".$forum_description."' class='textbox' style='width:230px;'/></td></tr>";

					echo"<tr><td width='50%' align='right' class='small2'>".$txt['admin_forumedit_sections']."&nbsp;</td>";
					echo"<td width='50%' align='left' class='small2'><select name='forum_sections' class='textbox' style='width:230px;'>".$forum_opts."</select></td></tr>";

					echo"<tr><td width='50%' align='right' class='small2'>";

					if (!isset($_GET['action']) || $_GET['action'] != "edit")
						{
							echo $txt['admin_forumedit_order_f_s']."&nbsp;</td>";
							echo"<td width='50%' align='left' class='small2'><input type='text' name='forum_order' class='textbox' style='width:45px;' />";
						}
					echo"</td></tr>";

					echo"<tr><td align='center' colspan='2'><input type='submit' name='save_forum' value='".$txt['admin_forumedit_savesect']."' class='button' /></td></tr>";

					echo"</form>";
					closetable();
				}
		}

	//======================================================
	// 3-� ����� ������� � ��������� �������� � �������
	$sect_link = WCF_SELF."?type=sections";
	$forum_link = WCF_SELF."?type=forum";
	$i = 1; $k = 1;

	selectdb(wcf);
	$result = db_query("SELECT * FROM ".DB_FORUMS." WHERE `forum_sections`='0' ORDER BY `forum_order`") or trigger_error(mysql_error());


	if (db_num_rows($result) != 0)
		{
			opentable();
   			echo"<tr><th width='60%' class='forum-caption'>".$txt['admin_forumedit_cat_or_forum']."</th>";
			echo"<th width='5%' class='forum-caption'></th>";
			echo"<th width='21%' class='forum-caption'>".$txt['admin_forumedit_order']."</th>";
			echo"<th width='10%' class='forum-caption'>".$txt['admin_forumedit_options']."</th></tr>";

			$i = 1;
			while ($data = db_array($result))
				{
					echo"<tr><td colspan='4'><hr></td></tr>";
					echo"<tr><td width='60%' class='small'><strong>".$data['forum_name']."</strong></td>";
					echo"<td align='center' width='5%' class='small'>".$data['forum_order']."</td>";
					echo"<td align='center' width='21%' class='small'>";

					if (db_num_rows($result) != 1)
						{
							$up = $data['forum_order'] - 1;
							$down = $data['forum_order'] + 1;

							if ($i == 1)
								{
									echo"<a href='".$sect_link."&action=md&order=".$down."&forum_id=".$data['forum_id']."'>".$txt['down']."</a>";
								}
							elseif ($i < db_num_rows($result))
								{
									echo"<a href='".$sect_link."&action=mu&order=$up&forum_id=".$data['forum_id']."'>".$txt['up']."</a>";
									echo"<a href='".$sect_link."&action=md&order=$down&forum_id=".$data['forum_id']."'>".$txt['down']."</a>";
								}
							else
								{
									echo"<a href='".$sect_link."&action=mu&order=$up&forum_id=".$data['forum_id']."'>".$txt['up']."</a>";
								}
						}
					$i++;
					echo"</td>";

					echo"<td align='center' width='1%' class='small' style='white-space:nowrap'>";
					echo"<a href='".$sect_link."&action=edit&forum_id=".$data['forum_id']."'>".$txt['admin_forumedit_edit']."</a> ::";
					echo"<a href='".$sect_link."&action=delete&forum_id=".$data['forum_id']."'>".$txt['admin_forumedit_del']."</a></td></tr>";
					echo"<tr><td colspan='4'><hr></td></tr>";

					$result2 = db_query("SELECT * FROM ".DB_FORUMS." WHERE `forum_sections`='".$data['forum_id']."' ORDER BY `forum_order`");

					if (db_num_rows($result2))
						{
							$k = 1;
							while ($data2 = db_array($result2))
								{
									echo"<tr><td class='tbl1' width='60%'><span class='alt'>".$data2['forum_name']."</span>";
									echo"[<a href='$aidlink&amp;action=prune&amp;forum_id=".$data2['forum_id']."'>".$txt['admin_forumedit_cleaning']."</a>]<br>";
									echo ($data2['forum_description'] ? "<span class='small2'>".$data2['forum_description']."</span>" : "")."</td>";
									echo"<td align='center' width='5%' class='tbl2'>".$data2['forum_order']."</td>";
									echo"<td align='center' width='21%' class='tbl1'>";

									if (db_num_rows($result2) != 1)
										{
											$up = $data2['forum_order'] - 1;
											$down = $data2['forum_order'] + 1;

											if ($k == 1)
												{
													echo"<a href='".$forum_link."&action=md&order=$down&forum_id=".$data2['forum_id']."&sections=".$data2['forum_sections']."'>".$txt['down']."</a>";
												}
											elseif ($k < db_num_rows($result2))
												{
													echo"<a href='".$forum_link."&action=mu&order=$up&forum_id=".$data2['forum_id']."&sections=".$data2['forum_sections']."'>".$txt['up']."</a>";
													echo"<a href='".$forum_link."&action=md&order=$down&forum_id=".$data2['forum_id']."&sections=".$data2['forum_sections']."'>".$txt['down']."</a>";
												}
											else
												{
													echo"<a href='".$forum_link."&action=mu&order=$up&forum_id=".$data2['forum_id']."&sections=".$data2['forum_sections']."'>".$txt['up']."</a>";
												}
										}
									$k++;
									echo"</td>";
									echo"<td align='center' width='1%' class='tbl1' style='white-space:nowrap'>";
									echo"<a href='".$forum_link."&action=edit&forum_id=".$data2['forum_id']."'>".$txt['admin_forumedit_edit']."</a> ::";
									echo"<a href='".$forum_link."&action=delete&forum_id=".$data2['forum_id']."'>".$txt['admin_forumedit_del']."</a></td>";
									echo"</tr>";
								}
						}
				}
			closetable();
		}
	require_once THEMES."templates/footer.php";
?>