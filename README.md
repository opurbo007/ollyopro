# Task For Support Engineer Job

## Overview

This repository contains an inventory management system developed using PHP, MySQL, and Ajax. The project requires debugging to address several identified bugs. Additionally, it needs to be made compatible with PHP 8.2 and hosted on a live server. This README provides an overview of the tasks to be completed and the issues that need to be resolved.

## Requirements

To successfully complete the tasks outlined below, you will need:

- Proficiency in PHP, MySQL, and Ajax.
- Familiarity with debugging techniques.
- Access to a hosting server for deployment or the ability to use a free hosting service like [InfinityFree](https://www.infinityfree.com/).

### Login Details

Username: john_smith@gmail.com
Password: password

## Tasks and Issues

### Issue One

Upon opening the project, you may encounter error messages indicating issues that need to be resolved. Your task is to address these errors and fix the underlying issues.

# Solution One:

1.  At first I need to connect database with PDO connection
2.  check the session variable like this in database_conncction.php

    session_start();

    // Register session variable

    if (!isset($_SESSION['type'])) {
        $_SESSION['type'] = '';
    }
    if (!isset($\_SESSION['user_id'])) {
    $\_SESSION['user_id'] = '';
    }

3.  There are typo in login.php where setting the session variable
    $_SESSION['usar_id'] = $row['user_id'];
    $\_SESSION['usar_name'] = $row['user_name'];
    its should be:
    $\_SESSION['user_id'] = $row['user_id'];
    $\_SESSION['user_name'] = $row['user_name'];

### Issue Two

The Total Credit Order column should display values, but currently, it appears empty. Your task is to address this issue and ensure that the column values are properly displayed.

# Solution Two:

There is a typo in the get_user_wise_total_order function in function.php file where in query "cradit" written which should be "credit"

### Issue Three

The order table should resemble [this layout](https://prnt.sc/_3v_5aiKCVpy). However, it is displaying like [this](https://prnt.sc/BfBPs-9aMArN), accompanied by some error messages. Your task is to rectify the order table to match the desired layout and resolve any associated error messages.

# Solution Three:

In order.php where fatching the order data there is mistake
"pageLength": true
it sould be
"pageLength": 10 //or any number

### Issue Four

The delete and update functions for the orders table are currently not functioning as expected. Your task is to resolve these issues and ensure that both the delete and update functions operate correctly.

# Solution Four:

In the order_action.php the value of count is empty string but its expect number

    	$count = "";
    	$count = 0;

### Issue Five

The search feature for the orders table is presently encountering an issue. Specifically, when attempting to search by user last name, it fails to yield results. Your objective is to rectify this issue and ensure that the search functionality operates seamlessly, including searches by user last name.

# Solution five:

If we want to search by every string value which matches it should be wrapped in in % value %
$query .= 'OR inventory_order_name LIKE "%' . $\_POST["search"]["value"] . '%" ';

### Issue Six

I am attempting to view the order details in PDF format, but the function is not functioning properly, as it is generating numerous error messages. Your task is to address and resolve all errors associated with this function.

# Solution Six:

upgraded the dompdf now its working fine

### Issue Seven

I am attempting to create a new user from the users page, using the username "Steven Paul Jobs", but encountering an issue. Please resolve the issue and create a new user with the specified username.

# Solution Seven:

The problem was in the session varible which solve in problem 1
I have create user with the username "Steven Paul Jobs". Its workingfine. No errors found

### Task One

Currently, there is no backend validation for the user's email field, allowing the creation of new users without a valid email address. It is necessary to implement backend validation for this field.

# Solution One:

In user_action.php

// vailiding user email

$user_email = filter_var($\_POST['user_email'], FILTER_VALIDATE_EMAIL);
if (!$user_email) {
echo "Invalid email format. Please enter a valid email address.";
exit;
}

This lines can do the job

### Task Two

Currently, the date format on the order page appears as "2024-03-25". You need to modify the format to display as "25 March 2024".

# Solution Two:

formate the date before adding them in array in order_fetch.php

    //date formate
    $formatted_date = date("d-F-Y", strtotime($row['inventory_order_date']));
    $sub_array[] = $formatted_date;

### Task Three

Currently, users can change their password from their profile page without providing their old password. You need to update the profile page update system to include the old password field. This way, users will be required to enter their old password to change their password.

# Solution Three:

add a old password field in profile.php and update the logic in edit_profile.php
where fetching the old password from database and match it with current old password given by the user and tem set new password

## Conclusion

Please refer to the tasks outlined above and provide detailed solutions for each issue. Once all the tasks are completed, the project should be deployed to a live server for final testing and verification. If you have any questions or need clarification, feel free to reach out. Thank you for your attention to these tasks.
