<?php require_once("views/default/default_header.php"); ?>


    <table>
    <thead>
        <tr><td>First Name</td>
            <td>Last Name</td>
            <td>Username</td>
            <td>Email</td>
            <td>Sex</td>
            <td>Admin</td>
            <td>Budget</td>
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
                $user->getBudget()
            ];
			$rows .= '<tr>';
			$percentage = 100 / sizeof($attributes);
			foreach($attributes as $attribute){
				$rows .= "<td style='width: " . $percentage . "px'>$attribute</td>";
            }
			$rows .= "<td><a href='/user/$user_id/edit'><button>Edit</button></a></td>";
			$rows .= "<td><button onclick='deleteUser($user_id)'>Delete</button></td>";
            $rows .= '</tr>';
        }
        echo $rows;
        ?>
    </tbody>
</table>
<?php require_once("views/default/footer.php") ?>