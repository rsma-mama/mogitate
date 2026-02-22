<?php

declare(strict_types=1);

$target = __DIR__ . '/../vendor/facade/ignition/src/SolutionProviders/MergeConflictSolutionProvider.php';

if (!is_file($target)) {
    exit(0);
}

$before = file_get_contents($target);
if ($before === false) {
    exit(0);
}

// PHP 8.2+ deprecates ${var} string interpolation; use {$var}.
$after = str_replace('cd ${directory};', 'cd {$directory};', $before);

if ($after === $before) {
    exit(0);
}

file_put_contents($target, $after);
