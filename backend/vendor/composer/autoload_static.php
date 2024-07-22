<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitddd363bef0841fe65ecd29997ab7ca2c
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitddd363bef0841fe65ecd29997ab7ca2c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitddd363bef0841fe65ecd29997ab7ca2c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitddd363bef0841fe65ecd29997ab7ca2c::$classMap;

        }, null, ClassLoader::class);
    }
}
