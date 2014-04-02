<div class="menu">
	<?php foreach($items as $item): ?>
			<?php
			 $button = "<div class=\"topMenuDiv\">".$item['label']."</div>";
			 echo CHtml::link($button,array('contributions/show','menu'=>$item['url'])); ?>
	<?php endforeach; ?>
</div>