<div class="menu">
<?php

	while(current($menuItems)){
		$item = current($menuItems);
		$isOdd = key($menuItems)%2;
		
		echo "<span class=\"item{$isOdd}\">"
		    .CHtml::link(CHtml::encode($item['title']), array('contributions/show','menu'=>$item['title']))
		    ."</span>";
		    
		if (next($menuItems)!=false){
			echo " | ";
		}    
	}
?>
</div>
