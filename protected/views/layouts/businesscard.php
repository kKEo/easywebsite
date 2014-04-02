<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="pl" />
<?php echo CHtml::cssFile(Yii::app()->request->baseUrl."/css/businesscard/styles.css")?>
<title><?php echo EasySettingsForm::getInstance()->pageTitle ?></title>
</head>

<body>
<div id="container">
<div id="page">
<div id="header">
<div id="headerTop">
<dir class="goto">
<?php $this->widget('EasyGoto'); ?>
</dir>
</div>
<div id="headerLogo"></div>
<div id="headerSubMenu"><?php $this->widget('EasySubpages'); ?></div>
<div id="headerLogoRight"></div>
<div id="headerMainMenu"><?php $this->widget('EasyTopMenu'); ?></div>
</div>

<div id="actualBody">
<table>
	<tr>
		<td>
		<div id="content"><?php echo $content; ?></div>
		</td>
		<td class="contentPicture"><?php 
		if (isset($_GET['menu'])) {
			if ($_GET['menu'] == "Test 2") {
				$image = "layout/classic/bodyPicture.jpg";
				echo "<img src=\""
				.Yii::app()->request->baseUrl
				."/images/"
				.$image
				."\"/>";
			} else {
				$image = "layout/classic/bodyPicture2.jpg";
				echo "<img src=\""
				.Yii::app()->request->baseUrl
				."/images/"
				.$image
				."\"/>";
			}
		}
		?></td>
	</tr>
</table>
</div>
</div>
<div id="footerBody"><?php $this->widget('EasyFooter'); ?></div>
</div>
<?php if (!Yii::app()->user->isGuest): ?>
<div id="userMenu"><?php $this->widget('UserMenu'); ?>
</div>
<?php endif;?>
</body>
</html>
