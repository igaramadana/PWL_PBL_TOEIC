<?php

return [
    'required' => ':attribute harus diisi.',
    'email' => ':attribute harus berupa alamat email yang valid.',
    'min' => [
        'string' => ':attribute harus minimal :min karakter.',
    ],
    'unique' => ':attribute sudah digunakan.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    
    'attributes' => [
        'email' => 'Email',
        'password' => 'Password',
        'role_id' => 'Role',
    ],
    
    'custom' => [
        'email' => [
            'required' => 'Email harus diisi',
            'email' => 'Format email tidak valid',
        ],
        'password' => [
            'required' => 'Password harus diisi',
            'min' => 'Password minimal :min karakter',
        ],
        'login_failed' => 'Email atau password salah',
        'role' => [
            'invalid' => 'Role tidak valid',
            'missing' => 'Akun Anda tidak memiliki role yang valid',
        ],
    ],
];