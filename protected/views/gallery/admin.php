<h5>Zarządzanie galerią ( <?php echo CHtml::link('Dodaj zdjęcie',array('create')); ?> )</h5>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('category'); ?></th>
    <th>Publ.</th>
    <th>Plik</th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->title); ?></td>
    <td><?php echo CHtml::encode($model->category); ?></td>
    <td><?php echo CHtml::encode($model->isPublished); ?></td>
    <td><?php echo CHtml::encode($model->filename); ?></td>
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