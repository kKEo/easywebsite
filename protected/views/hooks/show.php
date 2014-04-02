<h2>View Hooks <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Hooks List',array('list')); ?>]
[<?php echo CHtml::link('New Hooks',array('create')); ?>]
[<?php echo CHtml::link('Update Hooks',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Hooks',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Hooks',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>
</th>
    <td><?php echo CHtml::encode($model->title); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('contribution_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->contribution_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('type_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->type_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('position')); ?>
</th>
    <td><?php echo CHtml::encode($model->position); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('parent_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->parent_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>
</th>
    <td><?php echo CHtml::encode($model->created); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('created_by')); ?>
</th>
    <td><?php echo CHtml::encode($model->created_by); ?>
</td>
</tr>
</table>
