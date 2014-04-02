<h4><?php echo $model->title?></h4>
<span class="galleryBack"><?php echo CHtml::link("Powrót do galerii", array('gallery/index'))?></span>
<?php
	$image = $model->filename;
	$title = $model->title;  
	
    $path = Yii::app()->baseUrl."/images/gallery/t640x480/".$image;
    echo CHtml::image($path,"{$title}({$path})", array('width'=>'580',));
?>	
