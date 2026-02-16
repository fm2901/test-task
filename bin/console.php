#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Services\ArrayTransformer;
use App\Services\ArraySorter;

$command = $argv[1] ?? null;

switch ($command) {

    case 'transform':
        $service = new ArrayTransformer();

        $data = [
            ['A'=>1,'B'=>'x','C'=>'one'],
            ['A'=>2,'B'=>'y','C'=>'two'],
        ];

        print_r($service->transform($data));
        break;

    case 'sort':
        $service = new ArraySorter();
        $array = [5,3,7,1,0,1024,512];

        print_r($service->countingSort($array));
        break;

    default:
        echo "Available commands:\n";
        echo "  transform\n";
        echo "  sort\n";
}
