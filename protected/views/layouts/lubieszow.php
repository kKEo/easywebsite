<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="pl" />
<?php 
	echo CHtml::cssFile(Yii::app()->request->baseUrl."/css/lubieszow/styles.css");
?>
<link rel="icon" type="image/gif" href="<?php echo Yii::app()->request->baseUrl?>/images/icons/favicon.gif"/>
<title>Strona internetowa wsi Lubieszów</title>

<script language="JavaScript">
<!-- 
DayName = new Array(7)
DayName[0] = "niedziela"
DayName[1] = "poniedziałek"
DayName[2] = "wtorek"
DayName[3] = "środa"
DayName[4] = "czwartek"
DayName[5] = "piątek"
DayName[6] = "sobota"
MonthName = new Array(12)
MonthName[0] = "stycznia"
MonthName[1] = "lutego"
MonthName[2] = "marca"
MonthName[3] = "kwietnia"
MonthName[4] = "maja"
MonthName[5] = "czerwca"
MonthName[6] = "lipca"
MonthName[7] = "sierpnia"
MonthName[8] = "września"
MonthName[9] = "października"
MonthName[10] = "listopada"
MonthName[11] = "grudnia"
function getDateStr(){
var Today = new Date()
var WeekDay = Today.getDay()
var Month = Today.getMonth()
var Day = Today.getDate()
var Year = Today.getYear()
Year += 1900
return DayName[WeekDay] + "," + Day + " " + MonthName[Month] + "," + Year
}
//-->
  </script>

</head>

<body>
<div id="container">
	<div id="header">
		<div id="logoHome">
			<?php //echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/images/layout/logo.jpg", "iStron.pl"),"http://istron.pl")?>
			<script language="JavaScript">document.write("Dzisiaj jest " + getDateStr())</script>
		</div>
	</div>
	<div id="topMenu">
		<div id="topMenuLeft"></div>
		<div id="topMenuItems">
			<?php $this->widget('EWTopMenu'); ?>
		</div>
		<div id="topMenuRight"></div>
	</div>
	<div id="actualBody">
		<div id="content">
			<div id="leftMenu">
				<div class="leftMenuTop"></div>
				<div class="leftMenuBody">
					<?php $this->widget('EasySideMenu'); ?>
				</div>
				<div class="leftMenuTop"></div>
				<div class="leftMenuBody">
					<?php $this->widget('EasyArticles', array('title'=>'Aktualności')); ?>
					<?php $this->widget('EasyUserMenu',array('visible'=>!Yii::app()->user->isGuest)); ?>
				</div>
				<div id="leftMenuFooter"></div>
				
			</div>
			<div id="actualContent"><?php echo $content; ?></div>
		</div>
	</div>
	<div id="footer">
		<div id="footerCopyright"></div>
		<div id="footerMenu"> 
			<?php $this->widget('EasyFooter'); ?>
			<div id="copyright">Copyright by <a href="http://istron.pl">iStron.pl</a></div>
		</div>
	</div>
</div>

<script type="text/javascript">
  var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-22243235-1']);
      _gaq.push(['_trackPageview']);
        (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
</script>

</body>
</html>
