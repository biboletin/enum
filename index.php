<?php

include __DIR__ . '/vendor/autoload.php';

use Bibo\Enum\HttpStatus;

$status = HttpStatus::tryFrom(200);

if ($status) {
    echo $status->value . PHP_EOL; // 200
    echo $status->message() . PHP_EOL; // OK
    echo $status->category() . PHP_EOL; // 200
    dd($status->isSuccess());
} else {
    echo $status->message() . PHP_EOL;
}