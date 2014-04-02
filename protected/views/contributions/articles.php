<div class="article">
	<div class="title">
		Articles with chosen tag 		
	</div>
	<div class="body">
	<ol>
	<?php foreach ($articles as $n=>$article): ?>
			<li>
				<div class="articleLink">
				<?php echo CHtml::link($article['title'], array("contributions/show", 'id'=>$article['id']))?>
				</div>
				<div class="footer">
				 <div class="time"><?php echo $article['modified']?></div>
 				 <div class="tags">
 				 	<?php echo $article['tags'];?>
 				 </div> 
				</div>	
			</li>
	<?php endforeach; ?>
	</ol>
	</div>
</div>