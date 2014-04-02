<h1>Assign</h1>

<div class="yiiForm">
<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabel($model,'Contribution name: '); ?>
<?php echo CHtml::activeTextField($model,'title') ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($model,'Contribution Id'); ?>
<?php echo CHtml::activeHiddenField($model,'contribution_id'); ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($model,'Type Id'); ?>
<?php
  $data = Types::model()->fetchOptions();
// echo CHtml::activeTextField($model,'type_id') 
 echo CHtml::activeDropDownList($model, 'type_id', $data)?>
<p class="hint"></p>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($model,'Menu parent item'); ?>
<?php
  $data = Hooks::model()->mainMenuItems()->findAll(array('select'=>'id, title'));
  $d = CHtml::listData($data, 'id', 'title', '');
  echo CHtml::activeDropDownList($model, 'parent_id', $d)?>
<p class="hint"></p>
</div>

<div class="action">
<?php echo CHtml::submitButton('Assign'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->