<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="pl" />
<?php 
	echo CHtml::cssFile(Yii::app()->request->baseUrl."/css/business/styles.css");
    Yii::app()->clientScript->registerCoreScript('jquery');
?>
<link rel="icon" type="image/jpeg" href="<?php echo Yii::app()->request->baseUrl?>/images/icons/favicon.jpg"/>
<title><?php echo EasySettingsForm::getInstance()->pageTitle ?></title>
</head>

<body>
<?php if (!Yii::app()->user->isGuest): ?>
<div id="userMenu"><?php $this->widget('UserMenu'); ?>
</div>
<?php endif;?>
<div id="container">
	<div id="page">
		<div id="header">
		<div id="headerLogo"></div>
		<div id="headerMenu">
			<?php $this->widget('EWTopMenu');?>
		</div>
		<div id="headerBody">
			<div id="headerGlobe">
				<div style="padding-left: 37px;">
				<?php 
				   $this->widget('CFlexWidget',array(
	    			'baseUrl'=>Yii::app()->baseUrl."/images/flash",
					'name'=>"Untitled",
					'width'=>'264',
					'height'=>'199',
					'align'=>'left',
				    'bgColor'=>'#172437',
				    ));
				?>
				</div>
			</div>
			<div id="headerLeft"></div>
			<div id="headerRight"></div>
		</div>
		</div>
		<div id="actualBody">
			<div id="contentTop"></div>
			<div id="content">
				<div id="heightGuard2"></div>
				<?php echo $content; ?>
			</div>
			<div id="contentFooter">
				<?php $this->widget('EasyFooter'); ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
