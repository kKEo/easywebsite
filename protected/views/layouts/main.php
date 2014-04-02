<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<?php echo CHtml::cssFile(Yii::app()->request->baseUrl."/css/main/styles.css")?>
<?php echo CHtml::cssFile(Yii::app()->request->baseUrl."/index.php/dynamic.css")?>
<title><?php echo EasySettingsForm::getInstance()->pageTitle ?></title>
</head>

<body>
	<div id="container" class="c">
		<div id="header" class="c is_container">
			<div id="headerTop">
			</div>
			
			<div id="headerBody">
				<div id="cloudTag">
					<?php $this->widget('TagCloud')?>	
				</div>
			</div>
			<?php if (EasySettingsForm::getInstance()->topMenu): ?>		
			<div id="headerMenu">
				<?php $this->widget('EWTopMenu'); ?>
				<?php $this->widget('Subpages'); ?>
			</div>
			<?php endif; ?>
		</div>
		<div id="actualBody">
			<div id="leftmenu" class="c is_container">
				<div class="c interior">
					<div class="menu">
						
						<?php 
							$articles = explode(",",EasySettingsForm::getInstance()->leftPanel);
							foreach ($articles as $widget){
								$option = explode("-", $widget, 3);
								$this->widget($option[0], array('category'=>$option[1], 'title'=>$option[2], 'class'=>"portlet18"));
							}
						?>
						<?php $this->widget('UserMenu',array('visible'=>!Yii::app()->user->isGuest)); ?>
					</div>						
				</div>
			</div>
			
			<div id="content" class="c is_container">
				<div class="c interior border_color_001">
					<div style="width:1px; height:400px;float:left;"></div>
					<div style="width:430px;float:left;">
						<?php echo $content; ?>
					</div>
				</div>
			</div>
			
			<div id="rightmenu" class="c is_container">
				<div class="c interior">
					
					<?php 
						$articles = explode(",",EasySettingsForm::getInstance()->rightPanel);
						foreach ($articles as $widget){
							$option = explode("-", $widget, 3);
							if ($option[0] == "EA")
								$this->widget('EWArticles', array('category'=>$option[1], 'title'=>$option[2], 'class'=>"portlet30"));
							else 
								$this->widget('EasyPortlet', array('config'=>$option[1]."-".$option[2], 'class'=>"portlet30"));			
						}
					 ?>
					<p>Powered by <a href="http://www.yiiframework.com/doc/">Yii framework (<?php echo Yii::getVersion(); ?>)</a></p>
				</div>
			</div>
		</div>
		<?php if (EasySettingsForm::getInstance()->footer): ?>	
		<div id="footer" class="c is_container">
			<div class="c interior menu">
				<?php $this->widget('EWFooterOne'); ?>
			</div>
		</div>
		<?php endif; ?>	
	</div>
</body>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3300783-3");
pageTracker._trackPageview();
</script>

</html>
