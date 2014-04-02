<h2>Update Hooks <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Hooks List',array('list')); ?>]
[<?php echo CHtml::link('New Hooks',array('create')); ?>]
[<?php echo CHtml::link('Manage Hooks',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>