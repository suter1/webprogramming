<?php require_once("views/default/header.php") ?>
<?php require_once("views/default/navigation.php") ?>
<section class="section">
	<form method="post" action="/register" >
		<div class="divTable">
			<div class="divTableBody">
				<div class="divTableRow">
					<div class="divTableCell">
						<label id="user" for="username">Username</label>
					</div>
					<div class="divTableCell">
						<input type="text" name="username" required="required" value=""/>
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
						<label id="pw" for="password" >Password</label>
					</div>
					<div class="divTableCell">
						<input name="password" type="password" required="required"/>
					</div>
				</div>
				<div class="divTableRow">
					<div class="divTableCell">
						<label id="sex" for="sex" >Gender</label>
					</div>
					<div class="divTableCell">
						<input name="sex" type="radio" value="female" />
						<input name="sex" value="male" type="radio" />
					</div>
				</div>
				<div class="divTableRow">
					<div class="divTableCell">
						<label id="country" for="country" >Country</label>
					</div>
					<div class="divTableCell">
						 <select>
							<option value="ch">Schweiz</option>
							<option value="de">Deutschland</option>
						</select> 
					</div>
				</div>
				<div class="divTableRow">
					<div class="divTableCell">
						<label id="confirm" for="password_confirm">Confirm password</label>
					</div>
					<div class="divTableCell">
						<input name="password_confirm" type="password" required="required">
					</div>
				</div>
				<input type="submit" value="Submit">
			</div>
		</div>
	</form>
</section>
<?php require_once("views/default/footer.php") ?>
