<div class="linkPager">
	<?php $this->widget('CLinkPager',array('pages'=>$pages,'header'=>'&nbsp;')); ?>
</div>
<div id="galleryContent">
	<?php foreach($items as $n=>$item) {
		$this->renderPartial('_item', array('item'=>$item,'class'=>$n%2?"even":"odd"));
	} 
	?>
	</div>
<div class="linkPager">
<?php $this->widget('CLinkPager',array('pages'=>$pages,'header'=>'&nbsp;')); ?>
</div>

