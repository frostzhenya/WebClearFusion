<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: forum_posts.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	$forum_id = addslashes($_GET["forum_id"]);
	$thread_id = addslashes($_GET["id"]);

	if (isset($_GET['id']) and isset($_GET['forum_id']))
		{
			require "include/tinymce.php";
   			echo $simple_script;
			opentable();

			selectdb(wcf);
  			$p_cres = mysql_query("SELECT count(`post_date`) as kol FROM ".DB_FORUMS_POSTS." WHERE `forum_id`='$forum_id' AND `thread_id`='$thread_id'") or trigger_error(mysql_error());
			$p_kolzap = mysql_fetch_array($p_cres);

			if ($p_kolzap['kol'] > $config['page_forum_posts'])
				{
    					$page_len_p = $config['page_forum_posts'];
 
    					if (!isset($_GET['page']) or ($_GET['page'] == '')) $start_rec_p = 0; else $start_rec_p = ((int)$_GET['page']-1)*$config['page_forum_posts'];
				}
			else
				{
    					$page_len_p = $p_kolzap['kol'];
					$start_rec_p = 0;
				}

			$result = "SELECT *
					FROM ".DB_FORUMS_THREADS.",".DB_FORUMS_POSTS." 
					WHERE ".DB_FORUMS_POSTS.".`forum_id`='$forum_id'
					AND ".DB_FORUMS_POSTS.".`thread_id`='$thread_id'
					AND ".DB_FORUMS_THREADS.".`thread_id`='$thread_id'
					ORDER BY ".DB_FORUMS_POSTS.".`post_date` ASC LIMIT $start_rec_p,$page_len_p";

			$result_name = mysql_query($result) or trigger_error(mysql_error());
			$result = mysql_query($result) or trigger_error(mysql_error());

			//==============================
			// ������� ���������� ����������
			if ($result != 0) mysql_query("UPDATE ".DB_FORUMS_THREADS." SET `thread_views`=thread_views+1 WHERE `thread_id`='$thread_id'") or trigger_error(mysql_error());

			if (mysql_num_rows($result) > 0 )
				{
					if ($res = mysql_fetch_assoc($result_name))  $repl_name = $res['thread_subject'];

					echo"<tr><th width='100%' colspan='2' class='tbl'>".$repl_name."</th></tr>";

					while ($posts = mysql_fetch_array($result))
						{
							selectdb(wcf);
 							$query_user = mysql_query("SELECT * FROM ".DB_USERS." WHERE `user_id`=".$posts['user_id']." LIMIT 1");
  							$usr = mysql_fetch_assoc($query_user);

							echo"<tr><td width='20%' align='left' class='tbl2'>".ucfirst(strtolower($usr['user_name']))."<br>";

							if ($usr['user_avatar'] <> '')
								{
			  						echo"<img src='".IMAGES_A.$usr['user_avatar']."'/></td>";
								}
							else
								{
									echo"<img src='".IMAGES_A."null-avatar.gif' class='avatar'></td>";
								}
							echo"<td width='80%' align='left' class='tbl1'>".stripslashes($posts['post_text'])."</td></tr><tr><td colspan='2'><hr></td></tr>";
						}

  					if ($p_kolzap['kol'] > $config['page_forum_posts'])
						{
  							$page_counter_p = ceil($p_kolzap['kol'] / $config['page_forum_posts']);

   							if (!isset($_GET['page']) OR ($_GET['page'] == '') OR ($_GET['page'] == '_')) $tp3 = 1; else $tp3 = (int)$_GET['page'];
 							echo"<tr><td height='30' colspan='3' align='center' valign='middle' >". ShowPageNavigator('index.php?modul=post&id='.$thread_id.'&forum_id='.$forum_id.'&page=',$tp3,$page_counter_p)."</td></tr>";
  						}
				}
			//=========================
			// ����� �������� ���������
			if (isset($_SESSION['user_id']) or ($_SESSION['ip'] == $_SERVER['REMOTE_ADDR']))
				{
					if($_POST['posts'])
						{
							selectdb(wcf);
							// ������� ���������
							$p_add_post = mysql_query("INSERT INTO ".DB_FORUMS_POSTS."
										(`forum_id`,`thread_id`,`user_id`,`post_text`) VALUES
										('$forum_id','$thread_id','".$_SESSION['user_id']."','".addslash($_POST['posts'])."')") or trigger_error(mysql_error());
							$p_post_id = mysql_insert_id(); // ����������� id

							// ��������� ��� ����� � ���� ����� ���-�� ��������
							$p_updt_forum = mysql_query("UPDATE ".DB_FORUMS."
											SET `forum_lastpostid`='$p_post_id',`forum_postcount`=forum_postcount+1
											WHERE (`forum_id`='$forum_id')") or trigger_error(mysql_error());

							// ��������� ����
							$p_updt_thread = mysql_query("UPDATE ".DB_FORUMS_THREADS."
											SET `thread_lastpostid`='$p_post_id', `thread_lastuser`='".$_SESSION['user_id']."', `thread_postcount`=thread_postcount+1
											WHERE (`forum_id`='$forum_id' AND `thread_id`='$thread_id')") or trigger_error(mysql_error());

							echo"<img src='".IMAGES."ajax-loader.gif'/>";
							return_form(5,'?modul=post&id='.$thread_id.'&forum_id='.$forum_id);
						}
					else 
						{
							echo"<form method='post'>";
							echo"<tr><td align='center' colspan='2'><textarea name='posts'></textarea></td></tr>";
							echo"<tr><td align='center' colspan='2'><input type='submit' class='button' value='".$txt['forum_quick_reply']."'/></td></tr></form>";
						}
				}
			else if (!isset($_SESSION['user_id']) or ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']))
				{ 
					echo"<tr><td align='center' colspan='2'>".$txt['forum_log']."</td></tr>";
				}
			closetable();
		}

?>