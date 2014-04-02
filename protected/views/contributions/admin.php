<h4>Podstrony</h4>

<div class="actionBar">
[<?php echo CHtml::link('Wszystkie',array('admin')); ?>]
[<?php echo CHtml::link('Nieprzypisane',array('admin','filter'=>'unhooked')); ?>]
[<?php echo CHtml::link('Górne Menu',array('admin','filter'=>'topmenu')); ?>]
[<?php echo CHtml::link('Boczne Menu',array('admin','filter'=>'sidemenu')); ?>]
[<?php echo CHtml::link('Artykuły',array('admin','filter'=>'articles')); ?>]
[<?php echo CHtml::link('Stopka',array('admin','filter'=>'footer')); ?>]
[<?php echo CHtml::link('Nowa podstrona',array('create')); ?>]
</div>

<table class="ewtable">
  <thead>
  <tr>
    <th><?php echo $sort->link('title','Tytuł&nbsp;strony'); ?></th>
    <th><?php echo $sort->link('status', 'Publ.'); ?></th>
    <th><?php echo $sort->link('icon','Ikona'); ?></th>
    <th><?php echo $sort->link('tags','Tagi'); ?></th>
    <th><?php echo $sort->link('position','Pos.'); ?></th>
    <th><?php echo $sort->link('types','Lokalizacja'); ?></th>    
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>

  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link(CHtml::encode($model['title']),array('show','id'=>$model['id'])); ?></td>
    <td><?php echo CHtml::encode($model['status']); ?></td>
    <td><?php echo CHtml::encode($model['icon']); ?></td>
    <td><?php echo CHtml::encode($model['tags']); ?></td>
    <td>
    	<?php 
    		echo CHtml::imageButton(Yii::app()->baseUrl."/images/icons/positionPlus.gif",array('submit'=>'','params'=>array('command'=>'up', 'id'=>$model['ctid'])));    	
	    	echo " ".CHtml::encode($model['position']);  
	    	echo " ".CHtml::imageButton(Yii::app()->baseUrl."/images/icons/positionMin.gif",array('submit'=>'','params'=>array('command'=>'down', 'id'=>$model['ctid'])));
    	?>
    </td>
    <td>
    	<table>
    	<?php 
    		echo "<tr><td>".$model['description']."</td>";
    		echo "<td>".CHtml::imageButton(Yii::app()->baseUrl."/images/icons/smallX.gif",array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'unhook', 'id'=>$model['id'], 'contribution_id'=>$model['id'], 'type_id'=>$model['tid']),
      	  'confirm'=>"Are you sure to unhook #{$model['id']} z sekcji {$model['description']}?"))."</td></tr>";
    	?>
    	</table>
    </td>
    <td>
      <?php echo CHtml::link('Hook',array('hook','id'=>$model['id'])); ?>
	  <?php echo CHtml::link('Edit',array('update','id'=>$model['id'])); ?>
      <?php echo CHtml::linkButton('Delete',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model['id']),
      	  'confirm'=>"Are you sure to delete #{$model['id']}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>