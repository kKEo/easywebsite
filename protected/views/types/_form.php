<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('size'=>12,'maxlength'=>15)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'description'); ?>
<?php echo CHtml::activeTextField($model,'description'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'category'); ?>
<?php echo CHtml::activeTextField($model,'category',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->