<?php
return [
    'secret_key' => 'test12345',
    'issuer' => 'localdomain.com',
    'audience' => 'localdomain.com',
    'issued_at' => time(),
    'expiration_time' => time() + 3600, 
];
