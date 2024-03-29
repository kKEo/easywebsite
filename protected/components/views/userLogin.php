<?php echo CHtml::beginForm(); ?>
<div class="row">
<?php echo CHtml::activeLabel($form,'username'); ?>
<br/>
<?php echo CHtml::activeTextField($form,'username',array('size'=>10,'maxlength'=>10)) ?>
<?php echo CHtml::error($form,'username'); ?>
</div>
<div class="row">
<?php echo CHtml::activeLabel($form,'password'); ?>
<br/>
<?php echo CHtml::activePasswordField($form,'password',array('size'=>10,'maxlength'=>10)) ?>
<?php echo CHtml::error($form,'password'); ?>
</div>
<div class="row">
<?php echo CHtml::activeCheckBox($form,'rememberMe'); ?>
<?php echo CHtml::label('Remember me next time',CHtml::getActiveId($form,'rememberMe')); ?>
</div>
<div class="row">
<?php echo CHtml::submitButton('Login'); ?>
<!-- <p class="hint">You may login with <b>demo/demo</b></p>  -->
</div>
<?php echo CHtml::endForm(); ?>
<div class="footer"></div>
