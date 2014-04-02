<div class="article">
<?php if (!Yii::app()->user->isGuest):?>
	<div class="title">
	<div style="width: 100px; float:right; font-size:small; padding-right: 15px;">
	<?php echo CHtml::link('Edit this page',array('update','id'=>$model['id'])); ?>
	</div>
	</div>
<?php endif;?>
<div class="body">
<?php echo $model->content; ?>
</div>
</div>

