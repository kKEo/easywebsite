<div id="loginForm" class="widget">
<h4>Zmiana hasla</h4>


<?php if(Yii::app()->user->hasFlash('password')): ?>
<div class="confirmation">
<?php echo Yii::app()->user->getFlash('password'); ?>
</div>
<?php else: ?>

<div class="yiiForm"><?php echo CHtml::beginForm(); ?> <?php echo CHtml::errorSummary($form); ?>

<div class="simple"><?php echo CHtml::activeLabel($form,'username'); ?> &nbsp; &nbsp;
<?php echo CHtml::activeTextField($form,'username') ?></div>

<div class="simple"><?php echo CHtml::activeLabel($form,'oldPassword'); ?> &nbsp; &nbsp;
<?php echo CHtml::activePasswordField($form,'oldPassword') ?>
</div>

<div class="simple"><?php echo CHtml::activeLabel($form,'newPassword'); ?> &nbsp; &nbsp;
<?php echo CHtml::activePasswordField($form,'newPassword') ?>
</div>

<div class="simple"><?php echo CHtml::activeLabel($form,'newPassword2'); ?> &nbsp; &nbsp;
<?php echo CHtml::activePasswordField($form,'newPassword2') ?>
</div>
<br/>
<?php echo CHtml::submitButton('Zmień hasło'); ?></div>

<?php echo CHtml::endForm(); ?></div>
<!-- yiiForm -->

<?php endif; ?>