<h4>Nowa podstona</h4>

<div class="actionBar">
[<?php echo CHtml::link('Contributions List',array('list')); ?>]
[<?php echo CHtml::link('Manage Contributions',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>