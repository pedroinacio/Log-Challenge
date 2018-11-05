<?php

require 'vendor/autoload.php';

if($argc != 3 )
{
    exit( "Insert first and last number of sequence: <first> <last>\n" );
}

if($argv[1] >= $argv[2]){
	exit( "Last number must be bigger than first\n" );
} 

$sequence = new \App\Models\Sequence($argv[1],$argv[2]);

return $sequence->applyRulesToSequence();