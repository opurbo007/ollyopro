<?php

include ('database_connection.php');

if (isset($_POST['user_name'])) {

	if (!empty($_POST["user_new_password"])) {

		if (!empty($_POST["user_old_password"])) {

			$query = "SELECT user_password FROM user_details WHERE user_id = :user_id";
			$statement = $connect->prepare($query);
			$statement->bindParam(':user_id', $_SESSION["user_id"]);
			$statement->execute();
			$result = $statement->fetch();

			// Verify the old password
			if (password_verify($_POST["user_old_password"], $result['user_password'])) {

				$hashed_password = password_hash($_POST["user_new_password"], PASSWORD_DEFAULT);
				$query = "
                UPDATE user_details SET 
                    user_name = :user_name, 
                    user_email = :user_email, 
                    user_password = :user_password 
                WHERE user_id = :user_id
                ";
				$statement = $connect->prepare($query);
				$statement->bindParam(':user_name', $_POST["user_name"]);
				$statement->bindParam(':user_email', $_POST["user_email"]);
				$statement->bindParam(':user_password', $hashed_password);
				$statement->bindParam(':user_id', $_SESSION["user_id"]);
				$statement->execute();


				echo $statement->rowCount() > 0 ? '<div class="alert alert-success">Profile Edited</div>' : '<div class="alert alert-warning">No changes were made to the profile</div>';
			} else {

				echo '<div class="alert alert-danger">Old password is incorrect</div>';
			}
		} else {

			echo '<div class="alert alert-danger">Please enter your old password to change it</div>';
		}
	} else {

		$query = "
        UPDATE user_details SET 
            user_name = :user_name, 
            user_email = :user_email
        WHERE user_id = :user_id
        ";
		$statement = $connect->prepare($query);
		$statement->bindParam(':user_name', $_POST["user_name"]);
		$statement->bindParam(':user_email', $_POST["user_email"]);
		$statement->bindParam(':user_id', $_SESSION["user_id"]);
		$statement->execute();


		echo $statement->rowCount() > 0 ? '<div class="alert alert-success">Profile Edited</div>' : '<div class="alert alert-warning">No changes were made to the profile</div>';
	}
}

?>