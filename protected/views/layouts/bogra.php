<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="pl" />
<?php echo CHtml::cssFile(Yii::app()->request->baseUrl."/css/bogra/styles.css")?>
<link rel="icon" type="image/gif" href="<?php echo Yii::app()->request->baseUrl?>/images/icons/favicon.gif"/>
<title>Strona internetowa wsi Lubieszów</title>
</head>

<body>
<div id="container">
	<div id="topMenu">
		<div id="topMenuTop"></div>
		<div id="topMenuItems">
			<?php $this->widget('EWTopMenu'); ?>
		</div>
	</div>
	<div id="actualBody">
		<div id="content">
			<div id="rightSide">
				<div id="header"></div>
				<div id="actualContent">	
					<?php echo $content; ?>
				</div>
			</div>	
			<div id="leftSide">
				<div id="leftSideTop"></div>
				<div id="leftSideBody">
					<p>Ostatnio dodane
						<ul>
							<li>Raz</li>
							<li>Dwa</li>
							<li>Trzy</li>
						</ul>
					
					</p>
				</div>
				<div id="leftSideBorder"></div>
			</div>
		</div>
	</div>
	<div id="footer">
		<div id="footerCopyright"></div>
		<div id="footerMenu"> 
			<?php $this->widget('EasyFooter'); ?>
		</div>
	</div>
</div>

<?php if (!Yii::app()->user->isGuest): ?>
<div id="userMenu">
	<?php $this->widget('UserMenu',array('visible'=>!Yii::app()->user->isGuest)); ?>
</div>
<?php endif;?>
</body>
</html>