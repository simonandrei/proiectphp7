<?php

namespace App\Constants;

class ErrorMessages
{
    const INVALID_CREDENTIALS = 'The credentials are invalid';
    const INVALID_NAMES= 'First name , last name and username can not have less than 2 characters';
    const INVALID_EMAIL = 'Invalid Email';
    const INVALID_PASSWORD = 'Password can not have less than 6 characters';
    const INVALID_GENDER = 'Please select your gender';
    const INVALID_DATE = 'Please select your birthday';
    const INVALID_REPEATPASS = 'Passwords dont match';
    const EMAIL_EXISTS = "email allready exists";
    const Error = "error";
}
