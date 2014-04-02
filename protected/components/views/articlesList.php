<div class="menu">
<div class="header"><?php echo $title;?></div>
<div class="content">
<ul>
<?php 
	foreach ($items as $item){
		$button = "<div class=\"menuItem\">".$item['label']."</div>";
		echo "<li>".CHtml::link($button, $item['url'])."</li>";	
	}
?>
</ul>
</div>
<div class="footer"></div>
</div>