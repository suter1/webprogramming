<?php require_once("views/default/header.php") ?>
<?php require_once("views/default/navigation.php") ?>
<div>
    <label for="username">Username</label>
    <input type="text" name="username" value="<?php echo $options['username']?>" disabled="disabled"/><br>
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" value="<?php echo $options['first_name']?>" /><br>
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" value="<?php echo $options['last_name']?>" /><br>
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo $options['email']?>" /><br>
    <label for="sex">Male</label>
    <input type="radio" name="sex" value="male" <?php echo (($options['sex'] === "male") ? "checked" : "") ?>>
    <label for="sex">Female</label>
    <input type="radio" name="sex" value="female" <?php echo (($options['sex'] === "female") ? "checked" : "") ?>>
    <button onclick="alert('not yet implemented');">Update</button>
</div>
<?php require_once("views/default/footer.php") ?>