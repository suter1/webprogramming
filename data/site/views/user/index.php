<?php require_once("views/default/default_header.php"); ?>


    <table class="table">
    <thead>
        <tr><td>First Name</td>
            <td>Last Name</td>
            <td>Username</td>
            <td>Email</td>
            <td>Sex</td>
            <td>Admin</td>
            <td>Budget</td>
            <td>Deleted</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $rows = '';
        foreach($options['users'] as $user){
            $user_id = $user->getId();
            $attributes = [
                $user->getFirstName(),
                $user->getLastName(),
                $user->getUserName(),
                $user->getEmail(),
                $user->getSex(),
                $user->isAdmin(),
                $user->getBudget(),
                $user->isDeleted(),
            ];
			$rows .= '<tr>';
			$percentage = 100 / sizeof($attributes);
			foreach($attributes as $attribute){
				$rows .= "<td style='width: " . $percentage . "px'>$attribute</td>";
            }
			$rows .= "<td><a href='/user/$user_id/edit'><button>Edit</button></a></td><td>";
			if(!$user->isDeleted()) $rows .= "<button onclick='deleteUser($user_id)'>Delete</button>";
            $rows .= '</td></tr>';
        }
        echo $rows;
        ?>
    </tbody>
</table>
<?php require_once("views/default/footer.php") ?>