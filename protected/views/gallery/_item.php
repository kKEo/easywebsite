<div class="galleryItem <?php echo $class; ?>">
<div class="title"><?php echo $item->title; ?></div>
<?php
	$path = Yii::app()->baseUrl."/images/gallery/t160x120/".$item->filename;
	$image = CHtml::image($path, $item->title, array('width'=>'160', 'height'=>'120',));
	echo CHtml::link($image, array('gallery/show', 'id'=>$item->id)); 
?>
</div>