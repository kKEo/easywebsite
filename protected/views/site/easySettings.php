<?php if(Yii::app()->user->hasFlash('settings')): ?>
<div class="confirmation">
	<?php echo Yii::app()->user->getFlash('settings'); ?>
</div>
<?php endif;?>

<?php echo CHtml::errorSummary($settings); ?>

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

<div class="row">
	<?php echo CHtml::activeLabel($settings,'pageTitle'); ?>
	<?php echo CHtml::activeTextField($settings,'pageTitle'); ?>
</div>

<div class="row">
	<?php echo CHtml::activeLabel($settings,'itemsPerPage'); ?>
	<?php echo CHtml::activeTextField($settings,'itemsPerPage'); ?>
	<?php echo CHtml::error($settings,'itemsPerPage'); ?>
</div>

<div class="row">
	<?php echo CHtml::activeLabel($settings,'topMenu'); ?>:
	<?php echo CHtml::activeRadioButtonList($settings, 'topMenu', array("1"=>"Yes", "0"=>"No"), array("separator"=>" "));?>
	<?php echo CHtml::error($settings,'topMenu'); ?>
</div>

<div class="row">
	<?php echo CHtml::activeLabel($settings,'footer'); ?>:
	<?php echo CHtml::activeRadioButtonList($settings, 'footer', array("1"=>"Yes", "0"=>"No"), array("separator"=>" "));?>
	<?php echo CHtml::error($settings,'footer'); ?>
</div>

<div class="row">
	<?php echo CHtml::activeLabel($settings,'rightPanel'); ?> <br/>
	<?php echo CHtml::activeTextArea($settings,'rightPanel',array("rows"=>4, "cols"=>40)); ?>
	<?php echo CHtml::error($settings,'rightPanel'); ?>
</div>

<div class="row">
	<?php echo CHtml::activeLabel($settings,'leftPanel'); ?> <br/>
	<?php echo CHtml::activeTextArea($settings,'leftPanel',array("rows"=>4, "cols"=>40)); ?>
	<?php echo CHtml::error($settings,'leftPanel'); ?>
</div>

<div class="row">
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php echo CHtml::endForm(); ?>