<h2>Managing Types</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Types',array('create')); ?>]
</div>

<table class="ewtable">
  <thead>
  <tr>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('description'); ?></th>
    <th><?php echo $sort->link('category'); ?></th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link(CHtml::encode($model->name),array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->description); ?></td>
    <td><?php echo CHtml::encode($model->category); ?></td>
    <td>
      
	  <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/icons/smallPencil.gif","Edit",array("border"=>"0"))
	  	,array('update','id'=>$model->id)); ?>
      
      <?php echo CHtml::imageButton(Yii::app()->baseUrl."/images/icons/smallX.gif",array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"Are you sure to delete \"{$model->name}\" ?")); ?>	  
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>