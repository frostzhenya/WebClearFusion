<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: functions_text_process.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	//=============================================================================================
	// ������� ���������� \ ����� ���������. ��� ������������ ���� Mysql �� �������� ������.
	function addslash($text)
		{
			$text = addslashes($text);
			return $text;
		}

	//=============================================================================================
	// ���������������� �������, ������������� ��� ���������� HTML ���� � ������������� ������
	function stripinput($text)
		{
			if (!is_array($text))
				{
					$text = trim($text);
					$search = array("&", "\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
					$replace = array("&amp;", "&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
					$text = preg_replace("/(&amp;)+(?=\#([0-9]{2,3});)/i", "&", str_replace($search, $replace, $text));
				}
			else
				{
					foreach ($exts as $key => $value)
						{
							$text[$key] = stripinput($value);
						}
				}
			return $text;
		}

	//=============================================================================================
	//�������� &, \, ', \\, <, > ��� ���� �� ���� �������. � ���� ������ ������� �� �� ������������
	function phpentities($text)
		{
			$search = array("&", "\"", "'", "\\", "<", ">");
			$replace = array("&amp;", "&quot;", "&#39;", "&#92;", "&lt;", "&gt;");
			$text = str_replace($search, $replace, $text);
			return $text;
		}
?>