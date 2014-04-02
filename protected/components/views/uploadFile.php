
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
<div class="row">
<?php echo CHtml::activeHiddenField($form, 'target')?>
<?php echo CHtml::activeLabel($form,'file'); ?>
<br/>
<?php echo CHtml::activeFileField($form,'file') ?>
<?php echo CHtml::error($form,'file'); ?>
</div>

<div class="row">
<?php echo CHtml::submitButton('Upload'); ?>
</div>

<?php echo CHtml::endForm(); ?>
<div class="footer"></div>
