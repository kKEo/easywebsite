<div id="usermenu">
<span class="title"> Admin menu: </span>
<?php
	
	while(current($items)){
		
		$item = current($items);
		$isOdd = key($items)%2;
		
		echo "<span class=\"item{$isOdd}\">"
		    .CHtml::link($item['label'], $item['url'])
		    ."</span>";
		    
		if (next($items)!=false){
			echo " - ";
		}    
		
	}
	
	echo "<HR>".CHtml::link('Logout',array('site/logout'));

?>
</div>

