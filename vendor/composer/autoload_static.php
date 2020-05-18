<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6d916e45c51f9447a8b18647f428b7c7
{
    public static $files = array (
        '1a70a632f6af70a927e2f0f77386ad28' => __DIR__ . '/../..' . '/helper/setting.php',
        '23a19307e303bb6f16e3b9928f1e1854' => __DIR__ . '/../..' . '/helper/helperFunc.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6d916e45c51f9447a8b18647f428b7c7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6d916e45c51f9447a8b18647f428b7c7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}