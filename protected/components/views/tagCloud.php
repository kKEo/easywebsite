<?php foreach($weights as $tag=>$weight): ?>
<span class="tag" style="font-size:<?php echo $weight; ?>pt">
	<?php 
		if (isset($_GET['tag']) && $_GET['tag']==CHtml::encode($tag)) {
			echo '<strong>'.CHtml::encode($tag)."</strong>";
		} else {
			echo CHtml::link(CHtml::encode($tag),array('contributions/articles','tag'=>$tag));		
		}
	?>
</span>
<?php endforeach; ?>