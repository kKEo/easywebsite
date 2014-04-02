<h2>Contributions List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Contributions',array('create')); ?>]
[<?php echo CHtml::link('Manage Contributions',array('admin')); ?>]
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
<?php echo CHtml::encode($model->getAttributeLabel('chapter')); ?>:
<?php echo CHtml::encode($model->chapter); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('prev_chapter_id')); ?>:
<?php echo CHtml::encode($model->prev_chapter_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('next_chapter_id')); ?>:
<?php echo CHtml::encode($model->next_chapter_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('content')); ?>:
<?php echo CHtml::encode($model->content); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:
<?php echo CHtml::encode($model->status); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('redirect')); ?>:
<?php echo CHtml::encode($model->redirect); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('url')); ?>:
<?php echo CHtml::encode($model->url); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('icon')); ?>:
<?php echo CHtml::encode($model->icon); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('tags')); ?>:
<?php echo CHtml::encode($model->tags); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:
<?php echo CHtml::encode($model->created); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('created_by')); ?>:
<?php echo CHtml::encode($model->created_by); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:
<?php echo CHtml::encode($model->modified); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('modified_by')); ?>:
<?php echo CHtml::encode($model->modified_by); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>