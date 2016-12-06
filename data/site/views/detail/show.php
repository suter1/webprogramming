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
            <div style="width: 200px;">
			<?php
			if (isset($_SESSION['user_id']) && $options['owner_id'] == $_SESSION['user_id']) {
				$picture_id = $options['id'];
				$loc_edit = Localization::find_by(["qualifier" => 'edit', 'lang' => get_language()]);
				echo "<button onclick='/upload/$picture_id/edit'>" . $loc_edit->getValue() . "</button>";
			}

			if(isset($_SESSION['user_id']) && $options['owner_id'] != $_SESSION['user_id']))
				echo "<input type='hidden' name='picture_id' id='picture_id' value='$picture_id'/>";
			    echo "<button onclick='addToBasket()'>" . $options['buy']. "</button>";

			?>
            </div>
    </section>
<?php require_once("views/default/footer.php") ?>