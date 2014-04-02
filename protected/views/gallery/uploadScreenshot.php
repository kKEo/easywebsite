<?php if(Yii::app()->user->hasFlash('upload')): ?>
<div class="confirmation">
<?php echo Yii::app()->user->getFlash('upload'); ?>
</div>
<?php endif;?>

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

<TABLE>
<TR><TD>
<?php echo CHtml::activeLabel($form,'file'); ?>
</TD><TD>
<?php echo CHtml::activeFileField($form,'file',array('size'=>40)) ?>
<?php echo CHtml::error($form,'file'); ?>
</TD></TR>
<TR><TD>
<?php echo CHtml::activeLabel($form,'Save As'); ?>
</TD><TD>
<?php echo CHtml::activeTextField($form, 'saveAs',array('size'=>40,'maxlength'=>63));?>
<?php echo CHtml::activeHiddenField($form,'gameId') ?>
</TD></TR>
<TR><TD colspan="2">
<?php echo CHtml::submitButton('Upload'); ?>
</TD>
</TR>
</TABLE>

<?php echo CHtml::endForm(); ?>
