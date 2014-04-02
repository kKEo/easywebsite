<h5>Dodaj nowe zdjęcie (<?php echo CHtml::link('Zarządzaj galerią',array('admin')); ?>)</h5>


<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>