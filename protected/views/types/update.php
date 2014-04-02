<h2>Update Types <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Types List',array('list')); ?>]
[<?php echo CHtml::link('New Types',array('create')); ?>]
[<?php echo CHtml::link('Manage Types',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>