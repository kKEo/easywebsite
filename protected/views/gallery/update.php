<h4>Edit game <i>"<?php echo $model->title; ?>"</i></h4>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>