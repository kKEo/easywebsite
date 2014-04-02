<div class="form">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::errorSummary($model); ?>

<table>	<tr><td></td></tr>
<tr><td>
<?php echo CHtml::activeLabelEx($model,'title'); ?>
</td><td>
<?php echo CHtml::activeTextField($model,'title',array('size'=>40,'maxlength'=>200)); ?>
</td></tr>
<tr><td colspan="2">
<?php echo CHtml::activeLabelEx($model,'content'); ?> <br/>
<?php //echo CHtml::activeTextArea($model, 'content', array('rows'=>'10', 'cols'=>'80')); ?>
<?php
$this->widget('application.extensions.NHCKEditor.CKEditorWidget', 
    array('model' => $model,'attribute' => 'content',
        'editorOptions' => array('width' => 680,'height' => 480,
            'language' => 'pl',
            'toolbar' => "js:[
             	['Source','-','Templates','-','SelectAll','RemoveFormat'],
             	['Bold','Italic','Underline','Strike'],
             	['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
             	'/',
             	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    			['Link','Unlink','Anchor'],
    			['Image','Table'],
    			['TextColor','BGColor'],
             	['Format','Font','FontSize'],
            ]",
    		'on' => "js:{
    			instanceReady:function(ev){
    				this.dataProcessor.writer.setRules( 'p', {indent : false,breakBeforeOpen : true,breakAfterOpen : false,breakBeforeClose : false,breakAfterClose : true});
    				this.dataProcessor.writer.setRules( 'h3', {indent : false,breakBeforeOpen : true,breakAfterOpen : false,breakBeforeClose : false,breakAfterClose : true});
    				this.dataProcessor.writer.setRules( 'h4', {indent : false,breakBeforeOpen : true,breakAfterOpen : false,breakBeforeClose : false,breakAfterClose : true});
    				this.dataProcessor.writer.setRules( 'a', {indent : false, breakAfterClose : false});
    				}
    			}",
        ),
        'htmlOptions' => array(),
    )
);
?>
</td></tr>
<tr><td>
<?php echo CHtml::activeLabelEx($model,'status'); ?>
</td><td>
<?php echo CHtml::activeDropDownList($model,'status',Contributions::model()->statusOptions); ?>
</td></tr>
<tr><td>
<?php echo CHtml::activeLabelEx($model,'redirect'); ?>
</td><td>
<?php echo CHtml::activeTextField($model,'redirect',array('size'=>20,'maxlength'=>255)); ?>
</td></tr>
<tr><td>
<?php echo CHtml::activeLabelEx($model,'icon'); ?>
</td><td>
<?php echo CHtml::activeTextField($model,'icon',array('size'=>20,'maxlength'=>255)); ?>
</td></tr>
<tr><td>
<?php echo CHtml::activeLabelEx($model,'tags'); ?>
</td><td>
<?php echo CHtml::activeTextField($model,'tags',array('size'=>20,'maxlength'=>255)); ?>
</td></tr>
<tr><td>
<?php echo CHtml::submitButton($update ? 'Zapisz zmiany' : 'Dodaj wpis'); ?>
</td></tr>
</table>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->