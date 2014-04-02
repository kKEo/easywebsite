<span class="menu"> .: 
<?php
	while(1){
		echo current($menuItems);
		if (next($menuItems)!= false)
			echo " > ";
		else
			break;
	}
?>
</span>