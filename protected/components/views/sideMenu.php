<div class="menu">
<div class="header"><?php echo $title; ?></div>
<div class="content">
<?php foreach($items as $item){
	$button = "<div class=\"menuItem\">".$item['label']."</div>";
	echo CHtml::link($button, $item['url']);
}
?>
</div>
<div class="footer"></div>
</div>
<script type="text/javascript">
	$("div.menuItem").mouseover(function(){
    	$(this).fadeTo("fast", 1);
    }).mouseout(function(){
    	$(this).fadeTo("fast", 0.83);
    });
</script>
