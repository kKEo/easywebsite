<div id="loginForm" class="widget">

<h4>Login</h4>

<div class="yiiForm"><?php echo CHtml::beginForm(); ?> <?php echo CHtml::errorSummary($form); ?>

<div class="simple"><?php echo CHtml::activeLabel($form,'username'); ?> &nbsp; &nbsp;
<?php echo CHtml::activeTextField($form,'username') ?></div>

<div class="simple"><?php echo CHtml::activeLabel($form,'password'); ?> &nbsp; &nbsp;
<?php echo CHtml::activePasswordField($form,'password') ?>
</div>

<br/>
<div class="action"><?php echo CHtml::activeCheckBox($form,'rememberMe'); ?>
<?php echo CHtml::activeLabel($form,'rememberMe'); ?> <br /><br/>

<?php echo CHtml::submitButton('Login'); ?></div>

<?php echo CHtml::endForm(); ?></div>
<!-- yiiForm --></div>
