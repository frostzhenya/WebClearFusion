<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2014 lovepsone
+--------------------------------------------------------+
| Filename: footer.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	define("CONTENT", ob_get_contents());
	ob_end_clean();
	RenderPage(false);
	echo"</body>";
?>