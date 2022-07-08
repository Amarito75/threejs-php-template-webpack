<?php

$login = '';
$password = '';
$firstName = '';
$name = '';
$mail = '';
$adress = '';
$zipCode = 0;
$country = '';

$errorMessages = [];

if(!empty($_POST))
{
    // Debug
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    // Sanatize data
    $login = trim(htmlentities($_POST['login']));
    $password = $_POST['password'];

    /**
     * Errors
     */
    // Login
    if(empty($login))
    {
        $errorMessages[] = 'Missing login';
    }
    else if(!preg_match('/^[a-z0-9]+$/', $login))
    {
        $errorMessages[] = 'Login should contain lowercase and numbers';
    }
    else if(strlen($login) > 20)
    {
        $errorMessages[] = 'Login should be 20 chars long max';
    }

    // Password
    if(empty($password))
    {
        $errorMessages[] = 'Missing password';
    }
    else if(strlen($password) < 8)
    {
        $errorMessages[] = 'Password should be at least 8 chars long';
    }
    else if(
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[^a-zA-Z0-9]/', $password)
    )
    {
        $errorMessages[] = 'Password should contain lowercase, uppercase, numbers and symbols';
    }

    // Age
    if($age < 0 || $age > 150)
    {
        $errorMessages[] = 'Age should be between 0 and 150';
    }

    // Success
    if(empty($errorMessages))
    {
        //Hash
        // $password = hash('sha256', $password . SALT);
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into DB
        $prepare = $pdo->prepare('
            INSERT INTO
                users (login, password, first_name, name, mail, adress, zip_code, country)
            VALUES
                (:login, :password, :first_name, :name, :mail, :adress, :zip_code, :country)
        ');
        $prepare->execute([
            'login' => $login,
            'password' => $password,
            'first_name' => $firstName,
            'name' => $name,
            'mail' => $mail,
            'adress' => $adress,
            'zip_code' => $zipCode,
            'country' => $country

        ]);

        // Reset values
        $login = '';
        $password = '';
        $firstName = '';
        $name = '';
        $mail = '';
        $adress = '';
        $zipCode = 0;
        $country = '';

    }
}