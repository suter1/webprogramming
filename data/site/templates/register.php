<?php require_once("templates/default/header.php") ?>
<?php require_once("templates/default/navigation.php") ?>
<section class="section">
	<form method="post" action="/register" >
		<div class="divTable">
			<div class="divTableBody">
				<div class="divTableRow">
					<div class="divTableCell">
						<label id="user">Username</label>
					</div>
					<div class="divTableCell">
						<input type="text" name="name" required="required" value=""/>
					</div>
				</div>
				<div class="divTableRow">
					<div class="divTableCell">
						<label id="mail">E-Mail</label>
					</div>
					<div class="divTableCell">
						<input name="email" type="email" required="required" value=""/>
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
<?php require_once("templates/default/footer.php") ?>
