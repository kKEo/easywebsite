<?php
if (!empty($layouts)) { 
	echo "<TABLE> <TR><TH>Name</TH><TH>Thumb</TH><TH>Actions</TH></TR>";
	
	foreach ($layouts as $layout){
		$layoutName = basename(dirname($layout));
		echo "<TR><TD>".$layoutName."</TD>"
			."<TD></TD>"
			."<TD>"
			.CHtml::link('Generate',array('layout/crop','layout'=>$layoutName, 'filename'=>'istron'))
			."</TD></TR>";
	}
	echo "</TABLE>";
}
else
	echo "<li> There are no layouts found. </li>";
?>