<h2>Types List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Types',array('create')); ?>]
[<?php echo CHtml::link('Manage Types',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('code')); ?>:
<?php echo CHtml::encode($model->code); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:
<?php echo CHtml::encode($model->description); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('category')); ?>:
<?php echo CHtml::encode($model->category); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:
<?php echo CHtml::encode($model->created); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('created_by')); ?>:
<?php echo CHtml::encode($model->created_by); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>