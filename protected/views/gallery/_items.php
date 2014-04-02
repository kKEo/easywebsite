<?php foreach($items as $item):?>
	
<div class="item" id="i<?php echo $item->id; ?>">
	<div class="title">
		<?php echo CHtml::link($item->title, array('media/show', 'id'=>$item->id, '#'=>'game'));?>
	</div>
	<table>
		<tr>
			<td colspan="2"><?php $title?></td>
		</tr>
		<tr>
			<td colspan="2">
				<?php 
					$image = split(",",$item->screenshots,2);
					if (is_array($image)){
						$image = $image[0];
					}						
					if ($image==""){
						$image = "defaultNotFound.jpg";	
					}	
					$path = Yii::app()->baseUrl."/images/t160x120/".trim($image);
					$image = CHtml::image($path,"Zdjecie", array('width'=>'160', 'height'=>'120',));
					
					echo CHtml::link($image, array('media/show', 'id'=>$item->id, '#'=>'game')); 
				?>
			</td>
		</tr>
		<tr class="hide">
			<td>Rating</td>
			<td><?php echo $item->rating?></td>
		</tr>
		<tr class="hide">
			<td colspan="2">
				<?php echo CHtml::link("Play", array('media/display', 'item'=>$item->descId)); ?>
			</td>
		</tr>
	</table>
	<div class="footer">
		Hits: <?php echo $item->playedCount?>
	</div>
</div>

<?php endforeach;?>