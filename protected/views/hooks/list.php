<h2>Hooks List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Hooks',array('create')); ?>]
[<?php echo CHtml::link('Manage Hooks',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:
<?php echo CHtml::encode($model->title); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('contribution_id')); ?>:
<?php echo CHtml::encode($model->contribution_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('type_id')); ?>:
<?php echo CHtml::encode($model->type_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('position')); ?>:
<?php echo CHtml::encode($model->position); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('parent_id')); ?>:
<?php echo CHtml::encode($model->parent_id); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>