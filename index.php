<!DOCTYPE html>
<html lang="en">

  <?php
  include "config.inc";    //config file
  include "includes/head.inc";   // head
  include "includes/database_connect.inc";
  include "parsedown/Parsedown.php";
  ?>

  <body>
	  <?php
	  include "includes/header.inc";
	  ?>
	  <div class="container-fluid">
  <div class="row-fluid">
    <div class="span4">
      <!--TODO Sidebar content -->
    </div>


    <div class="span8">
      <!--Body content-->

		<?php
// for files in post database print the 10 most recent post titles and extract
//
$css = 0;   // change css class each iteration
$sql = "SELECT id, title, author, summary, date_published FROM posts ORDER BY date_published DESC LIMIT 10;";

      $result = $db->query($sql);
      if (!$result){
          die ('There was an error running a query [' . $db->error . ']');
        }
		while ($row = $result->fetch_assoc()) {
			?>
			<a href="post.php?post=<?= $row["id"] ?>">
			<div class="posts post<?= ($css % 10) ?>" >
			<h2><?= $row["title"] ?></h2>
			<p><?= "Author " . $row["author"] . ". Published on " . $row["date_published"] ?>.</p>
			<p><?php

		 $Parsedown = new Parsedown();    // convert markdown to html

		echo  ($Parsedown->text($row["summary"])); ?></p>
			</div></a>
			<?php
			$css++;   // increment css class
		}
?>
			<a href="post.php?post=<?= $file ?>">
			<div class="posts post<?= $css ?>" >
			<h2><?= $page_variables["title"] ?></h2>
			<?= $page_variables["date"] ?>
			<p><?= $page_variables["extract"] ?></p>
	        </div></a>

</div>
</div>
</div>
<?php



		include "includes/footer.inc";
		?>

  </body>

</html>
