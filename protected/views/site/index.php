<?php Yii::app()->clientScript->registerCoreScript('jquery');?>  

<?php echo CHtml::link('<->', "#", array("onclick"=>"js:toggleFloat('widgets')"))?>

Articles

<script type="text/javascript">

	function toggleFloat(elementId) {

		articles = $("#articles");
		widgets = $("#widgets");

		if (articles.hasClass("floatRight")) {
			articles.removeClass('floatRight').addClass('floatLeft');
			widgets.removeClass('floatRight').addClass('floatLeft');
		}	
		else { 
			articles.removeClass('floatLeft').addClass('floatRight');
			widgets.removeClass('floatLeft').addClass('floatRight');
		}	
	}
</script>