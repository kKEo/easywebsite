
<?php if (!Yii::app()->user->hasFlash('applyLayout')){
	echo "Are you sure you want to apply {$this->layout} layout? ";

	echo CHtml::linkButton('Yes, do it!!',array(
      	  'submit'=>'',
      	  'params'=>array('layout'=>$this->layout,'filename'=>'Example2'),

	));
	
} else {

	echo '<div class="confirmation">';
		echo Yii::app()->user->getFlash('applyLayout');
	echo '</div>';	
	
	echo "<ul>";

	$images = CFileHelper::findFiles(Yii::app()->getBasePath()."/../images/layout", array("level"=>0, "fileTypes"=>array("gif", "jpg")));

	foreach ($images as $image) {
		echo "<li>".basename($image)."</li>";
	}
	echo "</ul>";
}
?>

