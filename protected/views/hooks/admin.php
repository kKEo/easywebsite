<h5>Managing Hooks [<?php echo CHtml::link('New Hooks',array('create')); ?>]</h5>

<table class="ewtable">
  <thead>
  <tr>
    <th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('contribution_id'); ?></th>
    <th><?php echo $sort->link('type_id'); ?></th>
    <th><?php echo $sort->link('position'); ?></th>
    <th><?php echo $sort->link('parent_id'); ?></th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::encode($model->title); ?></td>
    <td><?php echo CHtml::link(CHtml::encode($model->contribution_id),array('contributions/update','id'=>$model->contribution_id)); ?></td>
    <td><?php echo CHtml::encode($model->type->description); ?></td>
    <td><?php echo CHtml::encode($model->position); ?></td>
    <td><?php echo CHtml::encode($model->parent_id); ?></td>
    <td>
      <?php echo CHtml::link('Edit',array('update','id'=>$model->id)); ?>
      <?php echo CHtml::linkButton('Delete',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"Are you sure to delete #{$model->id}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>