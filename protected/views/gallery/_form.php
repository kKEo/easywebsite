<div class="yiiForm">

<br/>

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

<?php echo CHtml::errorSummary($model); ?>

<table>

<tr><td>
<?php echo CHtml::activeLabel($model,'file'); ?>
</td><td>
<?php echo CHtml::activeFileField($model,'file',array('size'=>40)) ?>
<?php echo CHtml::error($model,'file'); ?>
</td></tr>
<tr><td>
<?php echo CHtml::activeLabel($model,'filename'); ?>
</td><td>
<?php echo CHtml::activeTextField($model, 'filename',array('size'=>40,'maxlength'=>63));?>
<tr><td>
<?php echo CHtml::activeLabelEx($model,'title'); ?>
</td><td>
<?php echo CHtml::activeTextField($model,'title',array('size'=>40,'maxlength'=>127)); ?>
</td></tr>
<tr><td>
<?php echo CHtml::activeLabelEx($model,'category'); ?>
</td><td>
<?php echo CHtml::activeTextField($model,'category',array('size'=>40,'maxlength'=>127)); ?>
</td></tr>
<tr><td>
<?php echo CHtml::activeLabelEx($model,'description'); ?>
</td><td>
<?php echo CHtml::activeTextArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
</td></tr>
<tr><td>
<?php echo CHtml::activeLabelEx($model,'isPublished'); ?>
</td><td>
<?php echo CHtml::activeTextField($model,'isPublished',array('size'=>1,'maxlength'=>1)); ?>
</td></tr>
<tr><td colspan="2">
<div class="action">
<?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?>
</div>
</td></tr>
</table>

<?php echo CHtml::endForm(); ?>


</div><!-- yiiForm -->