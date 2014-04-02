<b>Edycja strony (<?php echo CHtml::link('Anuluj',array('admin')); ?>)</b>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>