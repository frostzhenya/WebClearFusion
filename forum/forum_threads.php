<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: forum_threads.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	$forum_id = addslashes($_GET["id"]);

	if (isset($_GET['id']))
		{
			selectdb(wcf);
  			$thr_cres = mysql_query("SELECT count(`post_date`) as kol FROM `wcf_forums_posts` WHERE `forum_id`='$forum_id'") or trigger_error(mysql_error());
			$thr_kolzap = mysql_fetch_array($thr_cres);

			if ($thr_kolzap['kol'] > $config['page_forum_threads'])
				{
    					$page_len_thr = $config['page_forum_threads'];
 
    					if (!isset($_GET['page']) or ($_GET['page'] == '')) $start_rec_thr = 0; else $start_rec_thr = ((int)$_GET['page']-1)*$config['page_forum_threads'];
				}
			else
				{
    					$page_len_thr = $thr_kolzap['kol'];
					$start_rec_thr = 0;
				}

			$result = mysql_query("SELECT * FROM ".DB_FORUMS_THREADS." 
						LEFT JOIN ".DB_FORUMS_POSTS." ON ".DB_FORUMS_POSTS.".`post_id`=".DB_FORUMS_THREADS.".`thread_lastpostid`
						LEFT JOIN `wcf_users` ON `wcf_users`.`user_id`=".DB_FORUMS_THREADS.".`thread_author`
						WHERE ".DB_FORUMS_THREADS.".`forum_id`='$forum_id'
						ORDER BY ".DB_FORUMS_POSTS.".`post_date` DESC LIMIT $start_rec_thr,$page_len_thr");
			opentable();
			if (mysql_num_rows($result) > 0 )
				{
   					echo"<tr><th width='4%'></th>";
					echo"<th width='57%' class='forum-caption'>".$txt['forum_column_top_aut']."</th>";
					echo"<th width='21%' class='forum-caption'>".$txt['forum_column_last_post']."</th>";
					echo"<th width='5%' class='forum-caption'>".$txt['forum_column_replies']."</th>";
					echo"<th width='10%' class='forum-caption'>".$txt['forum_column_views']."</th></tr>";
					echo"<tr><th width='100%' colspan='5' align='left'><a href='index.php?modul=thread&create&forum_id=$forum_id'>$txt[forum_create_theme]</a></th></tr>";

					while($topics = mysql_fetch_array($result))
						{
							selectdb(wcf);
							$last_post =  mysql_query("SELECT * FROM ".DB_FORUMS_POSTS.",`wcf_users`
											WHERE ".DB_FORUMS_POSTS.".`post_id`='".$topics['thread_lastpostid']."'
											AND `wcf_users`.`user_id`='".$topics['thread_lastuser']."' LIMIT 1") or trigger_error(mysql_error());
							$last_post = mysql_fetch_assoc($last_post);

							echo"<tr><td width='4%' align='left' class='tbl1'></td>";
          						echo"<td align='left' class='tbl1'>&nbsp;&nbsp;<a href='index.php?modul=post&id=$topics[thread_id]&forum_id=$forum_id'>".$topics['thread_subject']."</a><br>&nbsp;&nbsp;".ucfirst(strtolower($topics['user_name']))."</td>";
							echo"<td width='21%' align='left' class='tbl1'>&nbsp;&nbsp;".$last_post['post_date']."<br>&nbsp;&nbsp;".$txt['forum_from']."&nbsp;&nbsp;".ucfirst(strtolower($last_post['user_name']))."</td>";
							echo"<td width='5%' align='center' class='tbl2'>".$topics['thread_postcount']."</td>";
							echo"<td width='11%' align='center' class='tbl2'>".$topics['thread_views']."</td></tr>";
						}
  					if ($thr_kolzap['kol'] > $config['page_forum_threads'])
						{
  							$page_counter_thr = ceil($thr_kolzap['kol'] / $config['page_forum_threads']);

   							if (!isset($_GET['page']) OR ($_GET['page'] == '') OR ($_GET['page'] == '_')) $tp3 = 1; else $tp3 = (int)$_GET['page'];
 							echo"<tr><td colspan='3' align='center' valign='middle' >". ShowPageNavigator('index.php?modul=thread&id='.$forum_id.'&page=',$tp3,$page_counter_thr)."</td></tr>";
  						}
				}
			closetable();
		}
	//=========================
	// ����� �������� ����
	if (isset($_GET['create']) & isset($_GET['forum_id']))
		{
			$forum_id = addslashes($_GET["forum_id"]);
			require "include/tinymce.php";
   			echo $advanced_script;

			echo"<form method='post'>";
			opentable();
       			echo"<tr><td width='15%' align='left' valign='middle'>".$txt['forum_create_name_theme']."<input name='modul' value='thread' type=hidden>&nbsp;&nbsp;<input type='text' class='textbox' name='thread_subject' size='40'></td></tr>";

			echo"<tr><td><br><textarea name='thread'></textarea></td></tr>";
			echo"<tr><td align='center'><input type='submit' class='button' value='".$txt['forum_create_theme']."'/></td></tr>";
			closetable();
			echo"</form>";

    			if ($_POST['thread'])
				{
					selectdb(wcf);
					// �������� ����
					$t_add_thread = mysql_query("INSERT INTO ".DB_FORUMS_THREADS."
									(`forum_id`,`thread_subject`,`thread_author`,`thread_lastpostid`,`thread_lastuser`,`thread_postcount`)
									VALUES ('$forum_id','".$_POST['thread_subject']."','".$_SESSION['user_id']."','0','".$_SESSION['user_id']."','1')") or trigger_error(mysql_error());
					$thread_id = mysql_insert_id();// ����������� id ����

					// ��������� ���������
					$t_add_post = mysql_query("INSERT INTO ".DB_FORUMS_POSTS." (`forum_id`,`thread_id`,`user_id`,`post_text`) VALUES ('$forum_id','$thread_id','".$_SESSION['user_id']."','".addslash($_POST['thread'])."')") or trigger_error(mysql_error());
					$t_lastpost_id = mysql_insert_id();// ����������� id ���������

					// ��������� ���� � ���� �������� Id ���������
					$t_updt_post = mysql_query("UPDATE ".DB_FORUMS_THREADS." SET `thread_lastpostid`='$t_lastpost_id' WHERE (`thread_id`='$thread_id')") or trigger_error(mysql_error());

					// ��������� ��� ����� � ���� ����� ���-�� ��������
					$t_updt_forum = mysql_query("UPDATE ".DB_FORUMS." SET `forum_lastpostid`='$t_lastpost_id',`forum_postcount`=forum_postcount+1, `forum_threadcount`=forum_threadcount+1 WHERE (`forum_id`='$forum_id')") or trigger_error(mysql_error());

					opentable();
					echo"<tr><td align='center'><img src='".IMAGES."ajax-loader.gif'/></td></tr>";
					return_form(10,'index.php?modul=post&id='.$thread_id.'&forum_id='.$forum_id);
					closetable();
				}
		}
?>