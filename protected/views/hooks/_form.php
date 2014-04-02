<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<table class="ewtable"> 

<tr><td>
	<?php echo CHtml::activeLabelEx($model,'title'); ?>
	</td><td> 
	<?php echo CHtml::activeTextField($model,'title',array('size'=>30,'maxlength'=>255)); ?>
</td></tr>
<tr><td>
	<?php echo CHtml::activeLabelEx($model,'contribution_id'); ?>
	</td><td> 
	<?php echo CHtml::activeTextField($model,'contribution_id'); ?>
</td></tr>
<tr><td>
	<?php echo CHtml::activeLabelEx($model,'type_id'); ?>
	</td><td> 
	<?php echo CHtml::activeTextField($model,'type_id'); ?>
</td></tr>
<tr><td>
	<?php echo CHtml::activeLabelEx($model,'position'); ?>
	</td><td> 
	<?php echo CHtml::activeTextField($model,'position'); ?>
</td></tr>
<tr><td>
	<?php echo CHtml::activeLabelEx($model,'parent_id'); ?>
	</td><td> 
	<?php echo CHtml::activeTextField($model,'parent_id'); ?>
</td></tr>
</table>

<div class="action">
<?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->