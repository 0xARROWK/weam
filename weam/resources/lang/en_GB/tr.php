<?php

// EN

return [

	// Common
    'Weam' => 'Weam',

    // Menu
    'Parameters' => 'Parameters',
    'Log In' => 'Log In',
    'Sign Up' => 'Sign Up',
    'Log Out' => 'Log out',
    'Current language' => App::getLocale(),
    'Default language' => config("app.fallback_locale"),

    // Log In/Sign Up modal
    'Username' => 'Username',
    'Enter your username' => 'Enter your username',
    'Password' => 'Password',
    'Password confirmation' => 'Password confirmation',
    '************' => '************',
    'Email address' => 'Email address',
    'Enter your email address' => 'Enter your email address',
    'Date of birth' => 'Date of birth',
    'Day' => 'Day',
    'Month' => 'Month',
    'Year' => 'Year',
    'Sorry, this user is not from here' => 'Sorry, this user is not from here.',
    'Too many login attempts' => 'Some limits are made to be exceeded... But not this one. Please try again in :seconds seconds.',
    'A verification link has been sent to your email address, if you did not receive the email, you can request another from your profile' => 'A verification link has been sent to your email address. If you did not receive the email, you can request another from your profile.',
    'View my profile' => 'View my profile',
    'Continue' => 'Continue',

    // Signup email verification
    'Weam - Account verification' => 'Weam - Account verification',

    // Home
    'Welcome' => 'Welcome to you :name|Welcome to us :name',

    // Tasks
    'Tasks' => 'Tasks',

    // CSRF and token errors
    'Invalid token' => 'The request was lost ! Maybe his privilege level was not high enough...',
    'We are unable to get your access token' => 'We are unable to get your access token. As a result, some requests will not have the necessary level of privilege.',
    'Invalid user access token' => 'Invalid user access token. In order for us to recover your data correctly, please log in again.',

    // Other errors
    'An error occured' => 'An unknown error has occurred. Please try again later.',
    'Your data could not be saved' => 'Intergalactic interference has occurred : your data could not be saved. Please try again later.',
    'Error' => 'Error',
    'We are unable to retrieve your data' => 'We are unable to retrieve your data. In order for us to recover your data correctly, please log in again.',

    //Form validation errors
    'Required' => [
        'username' => 'The "username" field has not been filled in correctly.',
        'email' => 'The "email" field has not been filled in correctly.',
        'password' => 'The "password" field has not been filled in correctly.',
        'birthdate' => 'The "date of birth" field has not been filled in correctly.',
    ],

    'Unique' => [
        'username' => 'You are unique. Your username must also be unique.',
        'email' => 'This email address is already associated with an account.',
    ],

    'String' => [
        'username' => 'The username is not a valid string',
        'email' => 'The email is not a valid string',
        'password' => 'The password is not a valid string',
    ],

    'Regex' => [
        'username' => 'Username must contain between 3 and 25 alphanumeric characters.',
        'password' => 'Password must contain at least 8 characters, including 1 upper case, 1 lower case and 1 number.',
    ],

    'Min' => [
        'password' => 'Password must contain at least 8 characters, including 1 upper case, 1 lower case and 1 number.',
    ],

    'Max' => [
        'email' => 'Email address must not exceed 75 characters.',
    ],

    'Between' => [
        'username' => 'Username must contain between 3 and 25 alphanumeric characters.',
    ],

    'Email' => [
        'email' => 'Please enter a valid email address.',
    ],

    'Strength' => [
        'password' => 'Your password is too easy to guess.'
    ],

    'Confirmed' => [
        'password' => 'Passwords do not match.',
    ],

    'Date' => [
        'birthdate' => 'Please enter a valid date.',
    ],

    'DateFormat' => [
        'birthdate' => 'Date of birth must be in the format mm-dd-yyyy.',
    ],

    'Before' => [
        'birthdate' => 'You must be at least 13 years old to create an account.',
    ],

    'After' => [
        'birthdate' => 'You don\'t look your age ! But if you are 150 years old or older you are not human, and only residents of planet Earth are allowed here. For the time being...',
    ],
];
