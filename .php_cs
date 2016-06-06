<?php

$header = <<<EOT
This file is part of the tmilos-value package.

(c) Milos Tomic <tmilos@gmail.com>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOT;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'header_comment' => array('header' => $header),
        'simplified_null_return' => false,
        'phpdoc_no_empty_return' => false,
        'phpdoc_to_comment' => false,
        'print_to_echo' => false,
    ])
    ->setUsingCache(false)
    ->finder(
        PhpCsFixer\Finder::create()
            ->in('src')
    )
;
