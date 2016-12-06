<?php require_once("views/default/header.php") ?>
<?php require_once("views/default/navigation.php") ?>
<?php require_once 'autoload.php'; ?>
	<section class="section">
		<div>
			<img src="/<?php echo $options['path'] ?>" class="wrap align-left"/>
			<aside class="aside_right">
				<p class="title">Title: <?php echo $options['title'] ?></p>
				<p>CHF <?php echo $options['price'] ?></p>
				<i class="fa fa-shopping-basket" aria-hidden="false"></i>
			</aside>
		</div>
		<article class="OptSize">
			<p>Bildgrössenauswahl</p>
			<article class="MetaData">"Meta data"</article>
		</article>
		<p>
			<?php
			if (isset($_SESSION['user_id']) && $options['owner_id'] == $_SESSION['user_id']) {
				$picture_id = $options['id'];
				$loc_edit = Localization::find_by(["qualifier" => 'edit', 'lang' => get_language()]);
				echo "<button onclick='/upload/$picture_id/edit'>" . $loc_edit->getValue() . "</button></div>";
			}

			if(isset($_SESSION['user_id']))
				echo "<button style='width: 200px;'><button onclick='addToBasket()'>" . $options['buy']. "</button>";

			?>
		</p>
	</section>
<?php require_once("views/default/footer.php") ?>