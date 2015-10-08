<!DOCTYPE html>
<html lang="en">

  <?php
  include "config.inc";
  include "includes/head.inc";
  include "parsedown/Parsedown.php";
  include "includes/database_connect.inc";
  ?>

  <body>
	  <?php
	  include "includes/header.inc";
?>
	  <div class="container-fluid">
  <div class="row-fluid">
	<div class="span4">
	  <!--Sidebar content-->

	</div>


	<div class="span8">

		<?php


// get post name from POST and display the post
$post_id = $_GET["post"];
$sql = "SELECT title, author, content, date_published, show_comments FROM posts WHERE id=$post_id;";
$result = $db->query($sql);
if (!$result){
	die ('There was an error running a query [' . $db->error . ']');
  }
  $row = $result->fetch_assoc();


?>
<div class="posts post<?= $post_id ?>">

		<h2><?= $row["title"] ?></h2>
		<p><?= "Author " . $row["author"] . ". Published on " . $row["date_published"] ?>.</p>
		<p>
			<?php

		 $Parsedown = new Parsedown();

		echo  ($Parsedown->text($row["content"])); ?></p>
</div>
<?php

   if($row["show_comments"] = 1){
	   ?>
	<div id="disqus_thread"></div>
	<script type="text/javascript">
	    /* * * CONFIGURATION VARIABLES * * */
	    var disqus_shortname = 'petermaydenblog';

	    /* * * DON'T EDIT BELOW THIS LINE * * */
	    (function() {
	        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	    })();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
</div>
</div>
</div>
	<?php
	}

		include "includes/footer.inc";
		?>
		</div>
  </body>

</html>
