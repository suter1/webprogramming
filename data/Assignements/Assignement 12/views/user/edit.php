<?php require_once("views/default/default_header.php"); ?>


    <div>
        <table>
            <tr>
                <td><label for="username"><?php echo $options['lang_username'] ?></label></td>
                <td><input type="text" title="username" name="username" value="<?php echo $options['username'] ?>"
                           disabled="disabled"/></td>
            </tr>
            <tr>
                <td><label for="first_name"><?php echo $options['lang_first_name'] ?></label></td>
                <td><input type="text" title="first-name" name="first_name" value="<?php echo $options['first_name'] ?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="last_name"><?php echo $options['lang_last_name'] ?></label></td>
                <td><input type="text" title="last_name" name="last_name" value="<?php echo $options['last_name'] ?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="email"><?php echo $options['lang_email'] ?></label></td>
                <td><input type="email" title="email" name="email" value="<?php echo $options['email'] ?>"/></td>
            </tr>
            <tr>
                <td><label for="sex"><?php echo $options['lang_sex'] ?></label></td>
                <td>
                    <label for="sex"><?php echo $options['lang_male'] ?></label>
                    <input type="radio" id="sex" name="sex"
                           value="male" checked='<?php echo(($options['sex'] === "male") ? "checked" : "") ?>' />
                    <label for="sex"><?php echo $options['lang_female'] ?></label>
                    <input type="radio" id="sex" name="sex"
                           value="female" checked='<?php echo(($options['sex'] === "female") ? "checked" : "") ?>' />
                </td>
            </tr>
			<?php
			if (current_user()->isAdmin()) {
				$out = "<tr>";
				$out .= '<td><label for="is_admin">Admin</label></td>';
				$checked = ($options['is_admin']) ? 'checked' : '';
				$out .= '<td><input type="checkbox" title="is_admin" name="is_admin" value="yes" ' . $checked . '></td></tr>';
				echo $out;
			}
			?>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" id="id" value="<?php echo $options['id'] ?>" />
                </td>
                <td>
                    <button onclick="updateUser();"><?php echo $options['lang_update'] ?></button>
                </td>
            </tr>
        </table>
    </div>
<?php require_once("views/default/footer.php") ?>