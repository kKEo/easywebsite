<div class="submenu">
<?php
foreach ($subpages as $n=>$page){
	echo "<div class=\"submenu{$n} submenuItem\"> "
		.CHtml::link(CHtml::encode($page['title']), array('contributions/show','menu'=>$page['page'], 'submenu'=>$page['title']))
		."</div>";
}
?>
</div>