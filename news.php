<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2013 lovepsone
+--------------------------------------------------------+
| Filename: news.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	require_once "maincore.php";
	require_once THEMES."templates/header.php";

  	$rows = WCF::$DB->select(' -- CACHE: 180
					SELECT count(`news_date`) as number FROM ?_news');
	foreach ($rows as $numRow=>$kolzap) {}

	if ($kolzap['number'] > WCF::$cfgSetting['page_news'])
	{
    		$page_len = WCF::$cfgSetting['page_news'];
 
    		if (!isset($_GET['page']) || ($_GET['page'] == ''))
		{
			$start_rec = 0;
		}
		else
		{
			$start_rec = ((int)$_GET['page']-1)*WCF::$cfgSetting['page_news'];
		}
	}
	else
	{
    		$page_len = $kolzap['number'];
		$start_rec = 0;
	}

  	$rows = WCF::$DB->select(' -- CACHE: 180
				SELECT * FROM ?_news
				LEFT JOIN ?_news_cats ON `news_cat_id`=`news_cat`
				LEFT JOIN ?_users ON ?_users.`user_id` = ?_news.`news_author`
				ORDER BY `news_date` DESC limit '.$start_rec.','.$page_len);

	opentable();
  	if ($rows != null)
	{
     		foreach ($rows as $numRow=>$data)
		{
			if (check_user($data['news_visibility']))
			{
				$news_cat_image = "";
				if ($data['news_show_cat'] == 1)
				{
					$img_size = @getimagesize(IMAGES_NC.$data['news_cat_image']);
					$news_cat_image = "<img src='".IMAGES_NC.$data['news_cat_image']."' width='".$img_size[0]."' height='".$img_size[1]."' class='news-category' />";
				}	

          			echo"<tr><td align='left' class='head-table'>".$data['news_subject']."</td></tr>";
				echo"<tr><td align='left'>".$news_cat_image.stripslashes($data['news_text'])."</td></tr>";
          			echo"<tr><td align='center'><br>".WCF::$locale['modul_news_creation_date']."&nbsp;".$data['news_date']."&nbsp;".WCF::$locale['modul_news_author']."&nbsp;
						".ucfirst(strtolower($data['user_name']))."&nbsp;|&nbsp;<a href='newsext.php?id=".$data['news_id']."'>".WCF::$locale['modul_news_read_more']."</a><br><hr></td></tr>";
			}
      		}

  		if ($kolzap['number'] > WCF::$cfgSetting['page_news'])
		{
  			$PageCounter = ceil($kolzap['number'] / WCF::$cfgSetting['page_news']);

   			if (!isset($_GET['page']) || ($_GET['page'] == '') || ($_GET['page'] == '_'))
			{
				$tp3 = 1;
			}
			else
			{
				$tp3 = (int)$_GET['page'];
			}
 			echo"<tr><td height='30' align='center'>".show_page(WCF_SELF.'?page=',$tp3,$PageCounter)."</td></tr>";
  		}
   	}
	else
	{
		echo"<tr><td align='center' valign='middle' >".WCF::$locale['modul_news_no_news']."</td></tr>";
	}
	closetable();

	require_once THEMES."templates/footer.php";
?>