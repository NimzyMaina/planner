<?php

require 'vendor/autoload.php';

// $cm = new Cmautoload;
// echo $cm->classmap();

$user = new User;
echo $user->greet();

echo '<br>';

echo get_domain();