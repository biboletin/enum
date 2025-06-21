<?php


use Biboletin\Enum\HashAlgorithm;

include __DIR__ . '/vendor/autoload.php';

dd(
    HashAlgorithm::SHA512->length(),
    HashAlgorithm::SHA384->length(),
    HashAlgorithm::SHA256->length(),
    HashAlgorithm::SHA512->digest('Hello, World!'),
    HashAlgorithm::SHA384->digest('Hello, World!'),
    HashAlgorithm::SHA256->digest('Hello, World!'),
    HashAlgorithm::SHA512->hmac('Hello, World!', 'secret_key'),
    HashAlgorithm::SHA384->hmac('Hello, World!', 'secret_key'),
    HashAlgorithm::SHA256->hmac('Hello, World!', 'secret_key'),
    HashAlgorithm::fromString('sha256'),
    HashAlgorithm::fromString('sha384'),
    HashAlgorithm::fromString('sha512'),
);
