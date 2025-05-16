<?php

return [
    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute must be a valid email address.',
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'unique' => 'The :attribute has already been taken.',
    'confirmed' => 'The :attribute confirmation does not match.',
    
    'attributes' => [
        'email' => 'email',
        'password' => 'password',
        'role_id' => 'role',
    ],
    
    'custom' => [
        'email' => [
            'required' => 'Email is required',
            'email' => 'Invalid email format',
        ],
        'password' => [
            'required' => 'Password is required',
            'min' => 'Password must be at least :min characters',
        ],
        'login_failed' => 'Invalid email or password',
        'role' => [
            'invalid' => 'Invalid role',
            'missing' => 'Your account does not have a valid role',
        ],
    ],
];