<h3>Configure</h3>  (<?php echo CHtml::link("Crop")?>)

<div>
<h5>Header info: </h5>
<?php 
$header = $configs['header'];
echo "Header background: ".$header['modules']['background'];
?>
</div>
<hr></hr>
<div>
<h5>Body info: </h5>
<?php 
$body = $configs['body'];
echo "Body background: ".$body['modules']['background'];
?>
</div>
<hr></hr>
<div>
<h5>Footer info: </h5>
<?php 
$footer = $configs['footer'];
echo "Footer background: ".$footer['modules']['background'];
?>
</div>
<hr></hr>