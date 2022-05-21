<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit51883c94b0c12cdfcd0239a53a6e37a3
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../../model',
        ),
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../../class',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit51883c94b0c12cdfcd0239a53a6e37a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit51883c94b0c12cdfcd0239a53a6e37a3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit51883c94b0c12cdfcd0239a53a6e37a3::$classMap;

        }, null, ClassLoader::class);
    }
}
