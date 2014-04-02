<span class="menu">
<?php
	foreach($menuItems as $item){
		
		echo "<span>"
			.CHtml::image(Yii::app()->baseUrl."/images/icons/v.gif","v",array("height"=>"16px"))
		    .CHtml::link(CHtml::encode($item['title']), array('contributions/show','menu'=>$item['title']))
		    ."</span>";
		    
		if (next($menuItems)!=false){
			echo " &nbsp; ";
		}    
	}
?>
</span>