<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: news_add.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	//===============================================
	// �������� �����
	$kol = 1;

	selectdb(wcf);
	$result = mysql_query("SELECT count(`news_date`) as kol FROM ".DB_NEWS." ") or trigger_error(mysql_error());
	$n_kolzap = db_array($result);

	if ($n_kolzap['kol'] > $config['page_news_edit'])
		{
    			$page_len_n = $config['page_news_edit']; 
    			if (!isset($_GET['page']) or ($_GET['page'] == '')) $start_rec_n = 0;
			else $start_rec_n = ((int)$_GET['page']-1)*$config['page_news_edit'];
		}
	else
		{
    			$page_len_n = $config['page_news_edit'];
			$start_rec_n = 0;
		}

	$result = mysql_query("SELECT * FROM ".DB_NEWS." ORDER BY `news_date` DESC limit $start_rec_n,$page_len_n") or trigger_error(mysql_error());

	echo"<form method='post'>";
	opentable();
	echo"<div align='center'><h1>".$txt['admin_newsmaker']."</h1></div><hr>";

	if (db_num_rows($result) > 0 )
		{
   			while ($data = db_array($result))
				{
          				echo"<tr><td align='left' class='page'><input name=id type=radio value='".$data['news_id']."'></td>";
          				echo"<td align='left' class='page'>".$data['news_title']."</td>";
          				echo"<td align='right' class='page'>".$data['news_date']."</td></tr>";
          				$kol++;
          			}

    			if ($n_kolzap['kol'] > $config['page_news_edit'])
				{
       					$pages_selector = '-';
       					$page_counter_n = ceil($n_kolzap['kol'] / $config['page_news_edit']);

       					if (!isset($_GET['page']) OR ($_GET['page'] == '') OR ($_GET['page'] == '_')) $tp3 = 1;
					else $tp3 = (int)$_GET['page'];

       					for ($i = 1; $i <= $page_counter_n; $i++)
						{
           						if ($tp3 == $i) $pages_selector .= ' '.$i.' -';
		   					else $pages_selector .= ' <A href="index.php?modul=newsedit&page='.$i.'">'.$i.'</a> -';
           					}
      					echo"<tr><td colspan='3' align='center' valign='middle'><b>".$pages_selector."</b></td></tr>";
     				}
    		}
	if ($kol > 1)
		{
			echo"<font color='red'>".$txt['admin_newsmaker_title']."</font><br>";
			echo"<br><table width='100%' height='30' border='0' cellpadding='0' cellspacing='0'>";
			echo"<tr><td align='center'><b>".$txt['admin_newsmaker_team']."</b>&nbsp;&nbsp;";
				echo"<select name=cmd class='textbox'><option value=1 selected>".$txt['admin_newsmaker_edit']."</option><option value=2>".$txt['admin_newsmaker_add']."</option>";
		}
	else
		{
			echo "<option value=2 selected>".$txt['admin_newsmaker_add']."</option>";
		}

	echo"<option value=3>".$txt['admin_newsmaker_del']."</option></select></td>";
	echo"<td align='center'><input action='index.php' name='modul' value='newsedit' type=hidden><input type='submit' class='button' value='".$txt['Run']."'></td></tr><hr><br>";

	//===============================================
	// ���������� ��������
	echo"<tr><td align='center' colspan='3'>";

	if (isset($_POST['cmd']))
		{
			//===============================================
			// ��������������
   			if ($_POST['cmd'] == edit AND $_POST['tema_edit'] <> '' AND $_POST['news_edit'] <> '' AND $_POST['news_edit_main'] <> '')
				{
					echo"<img src='".IMAGES."ajax-loader.gif'/><br>";
					$nt = addslashes($_POST['tema_edit']);
					$query = mysql_query("UPDATE ".DB_NEWS." SET `news_title`='".$nt."',`news_text`='".addslash($_POST['news_edit'])."',`news_text_main`='".addslash($_POST['news_edit_main'])."',`news_cats`='".(int)$_POST['catedit']."' WHERE `news_id`='".(int)$_POST['guid']."'") or trigger_error(mysql_error()); 

					if ($query)
						{
							echo $txt['admin_newsmaker_edit_succes'];
							return_form(20,'?modul=newsedit');
						}
					else
						{
							echo $txt['errors'];
							return_form(20,'?modul=newsedit');
						}
       				}
			//===============================================
			// ����������
			elseif ($_POST['cmd'] == newsadd AND $_POST['tema_add'] <> '' AND $_POST['news_add'] <> '' AND $_POST['news_add_main'] <> '')
				{
					echo"<img src='".IMAGES."ajax-loader.gif'/><br>";
					$nt = addslashes($_POST['tema_add']);
					$query = mysql_query("INSERT INTO ".DB_NEWS." (`news_title`,`news_text`,`news_text_main`,`news_cats`) values ('".$nt."','".addslash($_POST['news_add'])."','".addslash($_POST['news_add_main'])."','".(int)$_POST['catadd']."')") or trigger_error(mysql_error());

					if ($query)
						{
							echo $txt['admin_newsmake_add_succes'];
							return_form(20,'?modul=newsedit');
						}
					else
						{
							echo $txt['errors'];
							return_form(20,'?modul=newsedit');
						}
				}
			//===============================================
			// ��������
    			if (isset($_POST['id']) AND ($_POST['cmd'] == 3) AND ($_POST['id'] > 0))
				{
					echo"<img src='".IMAGES."ajax-loader.gif'/><br>";
					$query = mysql_query("DELETE FROM ".DB_NEWS." WHERE `news_id` = '".(int)$_POST['id']."'") or trigger_error(mysql_error());

					if ($query)
						{
							echo $txt['admin_newsmake_del_succes'];
							return_form(20,'?modul=newsedit');
						}
					else
						{
							echo $txt['errors'];
							return_form(20,'?modul=newsedit');
						}
				}
			elseif (($_POST['cmd'] == edit AND ($_POST['tema_edit'] == '' OR $_POST['news_edit'] == '' OR $_POST['news_edit_main'] == '')) OR ($_POST['cmd'] == newsadd AND ($_POST['tema_add'] == '' OR $_POST['news_add'] == '' OR $_POST['news_add_main'] == '')))
				{
					echo"<img src='".IMAGES."ajax-loader.gif'/><br>";
					echo $txt['admin_newsmaker_not_fields'];
					return_form(10,'?modul=newsedit');
				}
		}
	echo"</td></tr>";
	closetable();
	echo"</form>";

	//===============================================
	// ���. �����
	$result = mysql_query("SELECT * FROM ".DB_NEWS_CATS."") or trigger_error(mysql_error());
	$editlist = "";
	while ($news_cats = db_array($result))
		{
	  		$news_cats_list .= "<option value=".$news_cats['news_cat_id'].">".$news_cats['news_cat_name']."</option>";
		}

	//===============================================
	if (isset($_POST['cmd']))
		{
   			require "include/tinymce.php";
   			echo $advanced_script;
			//===============================================
			// ����� ��������������
     			if (isset($_POST['id']) AND ($_POST['cmd'] == 1) AND ($_POST['id'] > 0))
				{
       					$result = mysql_query("SELECT * FROM ".DB_NEWS." WHERE `news_id` = ".$_POST['id'].' limit 1') or trigger_error(mysql_error());
	   				$data = db_aassoc($result);

       					echo"<br><form method='post'>";
					opentable();

             				echo"<tr><td align='left' valign='middle'>".$txt['admin_newsmaker_teme']."&nbsp;&nbsp;";
					echo"<input name='modul' value='newsedit' type=hidden><input type='text' name='tema_edit' class='textbox' value='".$data['news_title']."' size='40'></td>";

        				echo"<tr><td align='left' valign='middle'>".$txt['admin_newsmaker_cat']."&nbsp;&nbsp;";
					echo"<input name='cmd' value='edit' type=hidden><input name='guid' class='textbox' value='".$data['news_id']."' type=hidden>";

        				echo"<select name=catedit class='textbox'>$news_cats_list</select>";
					echo"</td></tr>";

					echo"<tr><td><hr>".$txt['admin_newsmaker_newsflash']."</td></tr>";
       					echo"<tr><td><textarea name='news_edit'>".$data['news_text']."</textarea></td></tr>";
					echo"<tr><td><hr>".$txt['admin_newsmaker_newsfull']."</td></tr>";
       					echo"<tr><td><textarea name='news_edit_main'>".$data['news_text_main']."</textarea></td></tr>";
       					echo"<tr><td align='center'><br><input type='submit' class='button' value='".$txt['admin_newsmaker_edit']."'/></td></tr>";
					closetable();
					echo"</form>";
      				}
			//===============================================
			// ����� ����������
    			if ($_POST['cmd'] == 2)
				{
					echo"<form method='post'>";
					opentable();

        				echo"<tr><td align='left' valign='middle'>".$txt['admin_newsmaker_teme']."&nbsp;";
        				echo"<input name='modul' value='newsedit' type=hidden><input type='text' class='textbox' name='tema_add' size='40'></td></tr>";

        				echo"<tr><td align='left' valign='middle'>".$txt['admin_newsmaker_cat']."&nbsp;";
        				echo"<input name='cmd' value='newsadd' type=hidden>";

        				echo"<select name=catadd class='textbox'>$news_cats_list</select>";
					echo"</td></tr>";

					echo"<tr><td><hr>".$txt['admin_newsmaker_newsflash']."</td></tr>";
					echo"<tr><td><textarea name='news_add'></textarea></td></tr>";
					echo"<tr><td><hr>".$txt['admin_newsmaker_newsfull']."</td></tr>";
					echo"<tr><td><textarea name='news_add_main'></textarea></td></tr>";
					echo"<tr><td align='center'><br><input type='submit' class='button' value='".$txt['admin_newsmaker_add']."'/></td></tr>";
					closetable();
					echo"</form>";
				}
		}
?>