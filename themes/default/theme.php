<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2011 lovepsone
+--------------------------------------------------------+
| Filename: teme.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/
?>
	<HTML>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
	<HEAD><link rel="SHORTCUT ICON" href="images/favicon.ico">
	<TITLE><?php echo  $config['servername']; ?></TITLE>
	<LINK href="<?php echo $cssfile; ?>" type=text/css rel=stylesheet>
	<LINK href="wcf.css" type=text/css rel=stylesheet>
	<META http-equiv="content-type" content="text/html; charset=<?php echo  $code_page; ?>" /></HEAD>
	<BODY>
	<TABLE class=foundation cellSpacing=0 cellPadding=0>
  	<TBODY>
		 <!-- ����� -->
  		<TR>
    			<TD class=lefttitle></TD>
    			<TD align=center>
          			<table class=sitetitle cellSpacing=0 cellPadding=0>
          				<tbody>
           					<tr>
            						<td class=ugverhfon>&nbsp;</td>
            						<td class=topfon>&nbsp;</td>
            						<td class=fonmenu><a href="index.php"><?php  echo $config['servername']; ?></a></td>
            						<td class=topfon>&nbsp;</td>
            						<td class=ugverhfon2>&nbsp;</td>
           					</tr>
          				</tbody>
          			</table>
    			</TD>
    			<TD class=righttitle></TD>
  		</TR>
		<!-- ���� -->
		<!-- ����� ����� ����� -->
  		<TR>
    			<TD class=leftmenu>
      				<TABLE class=mainmenu>
       					<TBODY>
       						<TR><TD class=left-top></TD></TR>
       						<TR><TD class=left-body><?php require "panels/panels_l.php"; ?></TD></TR>
        					<TR><TD class=left-bottom></TD></TR>
       					</TBODY>
      				</TABLE>
    			</TD>

    			<TD class=mybody>
			<!-- ����������� ����� ����� -->
    				<TABLE class=mainbody cellSpacing=0 cellPadding=0>
    					<TBODY>
    						<TR>
        						<TD class=bodytopleft></TD>
        						<TD class=bodytop></TD>
        						<TD class=bodytopright></TD>
						</TR>
						<TR>
        						<TD class=bodyleft></TD>
        						<TD class=body><center><?php require "panels/panels_c.php"; ?></center></TD>
        						<TD class=bodyright></TD></TR>
						<TR>
        						<TD class=bodybottomleft></TD>
        						<TD class=bodybottom></TD>
        						<TD class=bodybottomright></TD>
						</TR>
					</TBODY>
				</TABLE>
			<!-- -->
  			</TD>
			<!-- ������ ����� ����� -->
  			<TD class=rightmenu>
      				<TABLE class=mainmenu>
       					<TBODY>
       						<TR><TD class=right-top></TD></TR>
       						<TR><TD class=right-body><?php require "panels/panels_r.php"; ?></TD></TR>
        					<TR><TD class=right-bottom></TD></TR>
       					</TBODY>
      				</TABLE>
			</TD>
  		</TR>
  	</TBODY>
	</TABLE>
	<br><hr width=90%>
	<CENTER><FONT size=-1><?php echo  $config['copyright']; ?></FONT></CENTER><br>
		<?php include($modules['changelang'][0]); ?>
	</BODY></HTML>