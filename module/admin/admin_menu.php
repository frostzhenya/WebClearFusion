<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: admin_menu.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	echo"<script type='text/javascript' src='js/adminmenu.js'></script>";
	echo"<table align='center'>";
	echo"<td align='center'><div class='adminmenu'>";
		echo"<ul id='cssmenu1'>";
			echo"<li style='border-left: 1px solid #202020;'><a>$txt[menu_admin_news]</a> 
						<ul>
    						<li><a href='index.php?modul=newsed&add'>$txt[menu_admin_news_add]</a></li>
    						<li><a href='index.php?modul=newsed&edit'>$txt[menu_admin_news_edit]</a></li>
    						<li><a href='index.php?modul=newsed&del'>$txt[menu_admin_news_del]</a></li>
    						</ul></li>";
			echo"<li style='border-left: 1px solid #202020;'><a>$txt[menu_admin_settings]</a> 
						<ul>
    						<li><a href='index.php?modul=adminsetpanel'>$txt[menu_admin_set_panel]</a></li>
    						<li><a href='index.php?modul=adminaddpanel'>$txt[menu_admin_add_panel]</a></li>
    						</ul></li>";

			echo"<li style='border-left: 1px solid #202020;'><a>$txt[log]</a> 
						<ul>
    						<li><a href='index.php?modul=alllogs'>$txt[1]</a></li>
    						<li><a href='index.php?modul=reglogs'>$txt[2]</a></li>
    						<li><a href=''>$txt[3]</a></li>
    						<li><a href=''>$txt[4]</a></li>
    						<li><a href=''>$txt[5]</a></li>
    						<li><a href=''>$txt[6]</a></li>
    						<li><a href=''>$txt[7]</a></li>
    						<li><a href=''>$txt[8]</a></li>
    						<li><a href=''>$txt[9]</a></li>
    						<li><a href=''>$txt[10]</a></li>
    						</ul></li>";
		echo"</ul>";
	echo"</div></td></table><br><br>";
?>
