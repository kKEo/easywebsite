<h2>View Contributions <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Contributions List',array('list')); ?>]
[<?php echo CHtml::link('New Contributions',array('create')); ?>]
[<?php echo CHtml::link('Update Contributions',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Contributions',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Contributions',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>
</th>
    <td><?php echo CHtml::encode($model->title); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('content')); ?>
</th>
    <td><?php echo CHtml::encode($model->content); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
</th>
    <td><?php echo CHtml::encode($model->status); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('redirect')); ?>
</th>
    <td><?php echo CHtml::encode($model->redirect); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('url')); ?>
</th>
    <td><?php echo CHtml::encode($model->url); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('icon')); ?>
</th>
    <td><?php echo CHtml::encode($model->icon); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('tags')); ?>
</th>
    <td><?php echo CHtml::encode($model->tags); ?>
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
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>
</th>
    <td><?php echo CHtml::encode($model->modified); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('modified_by')); ?>
</th>
    <td><?php echo CHtml::encode($model->modified_by); ?>
</td>
</tr>
</table>
