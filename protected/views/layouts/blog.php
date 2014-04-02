<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="pl" />
<?php 
	echo CHtml::cssFile(Yii::app()->request->baseUrl."/css/blog/styles.css");
?>
<link rel="icon" type="image/jpeg" href="<?php echo Yii::app()->request->baseUrl?>/images/icons/favicon.jpg"/>
<title>maziarz.org</title>
</head>

<body class="backgroundColor">
<a name="top"></a>
<div id="container">
	<div id="logo"></div>
	<div id="leftborder"></div>
	<div id="main" class="backgroundColor">
		<div id="heightGuard"></div>
		<div id="breadcrumbs" class="backgroundColor borderColor">
			<?php $this->widget('EasyBreadcrumbs', array('elements'=>array('title'=>'Home')));?> 
		</div>
		<div id="content">
			<div id="indexMenu">
				<?php //$this->widget('EasyTopMenu'); ?>
			</div>
			<div id="widgets" class="floatLeft">
				<div class="widget">
					<hr/>
					Tags:
					<?php $this->widget('EasyTagCloud'); ?>
					<hr/>
				</div>
			</div>
			<div id="articles" class="floatLeft">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
	<div id="rightborder"></div>
	<div id="footer"></div>
</div>

<?php if (!Yii::app()->user->isGuest): ?>
<div id="userMenu"><?php $this->widget('UserMenu'); ?>
</div>
<?php endif;?>
<?php echo CHtml::link("Login", array("site/login")) ?>


</body>
</html>
