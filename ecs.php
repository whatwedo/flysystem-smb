<?php

declare(strict_types=1);

use PHP_CodeSniffer\Standards\Squiz\Sniffs\Commenting\ClassCommentSniff;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\Commenting\FileCommentSniff;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\Commenting\FunctionCommentThrowTagSniff;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $config): void {
    $config->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ]
    );

    // run and fix, one by one
    $config->import('vendor/whatwedo/php-coding-standard/config/whatwedo-symfony.php');

    $config->skip(
        [
            FileCommentSniff::class,
            ClassCommentSniff::class,
            FunctionCommentThrowTagSniff::class
        ]
    );

    $config->parallel();
};
