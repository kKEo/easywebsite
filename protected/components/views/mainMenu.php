<ul>
<?php if($position=="vertical"): ?>
	<?php foreach($items as $item): ?>
	<li><div>
		<?php 
		if (isset($item['type']) && $item['type'] == "linkButton")
			echo CHtml::linkButton($item['label'],array('submit'=>$item['url'],'params'=>$item['params'])); 
		else {
			if (isset($item['icon']))
				echo CHtml::image(Yii::app()->baseUrl."/images/".$item['icon']);
			echo CHtml::link($item['label'],$item['url'],(isset($item['active'])) ? array('class'=>'active') : array());
		}
		?>
	</div></li>
	<?php endforeach; ?>
<?php else: ?>
	<?php foreach($items as $item): ?>
		<li>
			<?php echo CHtml::link($item['label'],$item['url'],
			$item['active'] ? array('class'=>'active') : array()); ?>
		</li>
	<?php endforeach; ?>
<?php endif;?>
</ul>