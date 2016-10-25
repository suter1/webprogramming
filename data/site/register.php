<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="isithombe_default.css"/>
	<meta charset="UTF-8"/>
	<title>Register</title>
</head>
<body>
<div class="flex-container">
	<?php include_once("header.php"); ?>

	<?php include("navigation.php") ?>

<!--	<aside class="aside_left">-->
<!--		<p>Article left aside</p>-->
<!--	</aside>-->

	<section class="section">
		<?php include_once('validate.php') ?>
		<form method="post">
			<div class="divTable">
				<div class="divTableBody">
					<div class="divTableRow">
						<div class="divTableCell">
							<label id="user">Username</label>
						</div>
						<div class="divTableCell">
							<input name="name" required="required" value="<?php echo $name;?>"/>
							<mark><?php echo $e_name;?></mark>
						</div>
					</div>
					<div class="divTableRow">
						<div class="divTableCell">
							<label id="mail">E-Mail</label>
						</div>
						<div class="divTableCell">
							<input name="email" type="text" required="required" value="<?php echo $email;?>"/>
							<mark><?php echo $e_email;?></mark>
						</div>
					</div>
					<div class="divTableRow">
						<div class="divTableCell">
							<label id="pw">Password</label>
						</div>
						<div class="divTableCell">
							<input name="passw" type="password" required="required"/>
						</div>
					</div>
					<div class="divTableRow">
						<div class="divTableCell">
							<label id="confpw">Confirm password</label>
						</div>
						<div class="divTableCell">
							<input name="confpassw" type="password" required="required">
						</div>
					</div>
					<input type="submit" value="Submit">
				</div>
			</div>
		</form>
	</section>

	<aside class="aside_right">
		<p>Aside rechts</p>
	</aside>
</div>
</body>
</html>