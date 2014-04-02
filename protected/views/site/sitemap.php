<?php 
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc>http://istron.pl/</loc>
      <lastmod>2010-01-16</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
   </url>
   <?php foreach ($sites as $site) :?>
   <url>
      <loc><?php echo $site; ?></loc>
      <changefreq>monthly</changefreq>
      <priority>0.55</priority>
   </url>
   <?php endforeach; ?>
</urlset>