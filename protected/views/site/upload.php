<?php if(Yii::app()->user->hasFlash('upload')): ?>
<div class="confirmation">
<?php echo Yii::app()->user->getFlash('upload'); ?>
</div>
<?php endif;?>

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

<div class="row">
<?php echo CHtml::activeLabel($form,'Target'); ?> <br></br>
<?php echo CHtml::activeRadioButtonList($form, 'target', array(""=>"Obrazek", "icons"=>"Ikona", "layout/".Yii::app()->layout=>"Layout(".Yii::app()->layout.")"));?>
<?php echo CHtml::error($form,'target'); ?>
</div>

<div class="row">
<?php echo CHtml::activeLabel($form,'file'); ?>
<?php echo CHtml::activeFileField($form,'file') ?>
<?php echo CHtml::error($form,'file'); ?>
</div>

<div class="row">
<?php echo CHtml::submitButton('Upload'); ?>
</div>

<?php echo CHtml::endForm(); ?>
