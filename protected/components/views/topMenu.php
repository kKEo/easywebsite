<div class="menu">
	<ul>
	<?php foreach($items as $item): ?>
		<li>
			<?php
			$button = "<div class=\"menuItem\">".$item['label']."</div>";
			 echo CHtml::link($button,array('contributions/show','menu'=>$item['url']),
			$item['active'] ? array('class'=>'active') : array()); ?>
			
		</li>
	<?php endforeach; ?>
	</ul>
	
</div>
<script type="text/javascript">
	$("div.menuItem").mouseover(function(){
    	$(this).fadeTo("fast", 1);
    }).mouseout(function(){
    	$(this).fadeTo("fast", 0.83);
    });
</script>
