<h2>New Hook</h2>

<div class="actionBar">
[<?php echo CHtml::link('Manage Hooks',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>