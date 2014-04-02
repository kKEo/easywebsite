<?php $this->pageTitle=Yii::app()->name . ' - Contact Us'; ?>

<h3>Napisz do nas</h3>

<?php if(Yii::app()->user->hasFlash('contact')): ?>
<div class="confirmation">
<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>
<?php else: ?>

<div class="yiiForm">

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($contact, "Proszę wprowadzić poprawne wartości:"); ?>

<table>
<tr><td width=200>
<?php echo CHtml::activeLabel($contact,'name'); ?>
</td><td>
<?php echo CHtml::activeTextField($contact,'name'); ?>
</td></tr>
<tr><td>
	<?php echo CHtml::activeLabel($contact,'email'); ?>
	</td><td>
	<?php echo CHtml::activeTextField($contact,'email'); ?>
</td></tr>
<tr><td>

	<?php echo CHtml::activeLabel($contact,'subject'); ?>
	</td><td>
	<?php echo CHtml::activeTextField($contact,'subject',array('size'=>30,'maxlength'=>68)); ?>
</td></tr>
<tr><td>
	<?php echo CHtml::activeLabel($contact,'body'); ?>
	</td><td>
	<?php echo CHtml::activeTextArea($contact,'body',array('rows'=>6, 'cols'=>40)); ?>
</td></tr>
<tr><td colspan="2">
	<?php if(extension_loaded('gd')): ?>
	<div class="simple">
		<?php echo CHtml::activeLabel($contact,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha', array('buttonLabel'=>'Pobierz nowy kod')); ?>
		<?php echo CHtml::activeTextField($contact,'verifyCode'); ?>
		</div>
		<p class="hint">Wprowadź litery widoczne na obrazku.
		<br/>Wielkość liter jest ignorowana.</p>
	</div>
	<?php endif; ?>
</td></tr>
<tr><td colspan="2">

<div class="action">
<?php echo CHtml::submitButton('Wyślij pytanie'); ?>
</div>
</td></tr>
</table>
<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->
<?php endif; ?>