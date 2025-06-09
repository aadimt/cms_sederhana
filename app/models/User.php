<?php

class User
{
    private $users = [
        [
            'username' => 'admin',
            'password' => 'admin123' // Password plaintext untuk contoh (sebaiknya di-hash di sistem real)
        ],
        [
            'username' => 'user',
            'password' => 'user123'
        ]
    ];

    public function login($username, $password)
    {
        foreach ($this->users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                return true;
            }
        }
        return false;
    }
}
