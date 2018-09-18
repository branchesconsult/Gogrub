<?php

return [

    'messages' => [
        'registeration' => [
            'success' => 'You have registered successfully. Please enter 4 digit pin recieved on your mobile number!',
        ],
        'login' => [
            'success' => 'Login Successfull.',
            'failed' => 'Invalid Credentials! Please try again.',
        ],
        'logout' => [
            'success' => 'Successfully logged out.',
        ],
        'forgot_password' => [
            'success' => 'We have sent email with reset password link. Please check your inbox!.',
            'validation' => [
                'email_not_found' => 'This email address is not registered.',
            ],
        ],
        'refresh' => [
            'token' => [
                'not_provided' => 'Token not provided.',
            ],
            'status' => 'Ok',
        ],
    ],

];
