<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d3aad57f71b959683265af88ef75760
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rentit\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rentit\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d3aad57f71b959683265af88ef75760::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d3aad57f71b959683265af88ef75760::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
