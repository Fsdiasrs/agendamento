<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4f4216314ccf4a0049fd95933dd04539
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'ZxcvbnPhp\\' => 10,
        ),
        'T' => 
        array (
            'Traits\\' => 7,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
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
        'ZxcvbnPhp\\' => 
        array (
            0 => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src',
        ),
        'Traits\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../../traits',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4f4216314ccf4a0049fd95933dd04539::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4f4216314ccf4a0049fd95933dd04539::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4f4216314ccf4a0049fd95933dd04539::$classMap;

        }, null, ClassLoader::class);
    }
}
