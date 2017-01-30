<?php

namespace App\Console\Commands;


class MessageCreator
{

    public function create(string $name, string $greeting = 'Hello') : string
    {
        return "$greeting $name!";
    }
}