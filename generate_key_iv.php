<?php
// Generate a 256-bit (32-byte) encryption key
$encryption_key = bin2hex(openssl_random_pseudo_bytes(32)); // 64 characters in hex

// Generate a 128-bit (16-byte) initialization vector (IV)
$iv = bin2hex(openssl_random_pseudo_bytes(16)); // 32 characters in hex

echo "Encryption Key: " . $encryption_key . "\n";
echo "IV: " . $iv . "\n";
?>
