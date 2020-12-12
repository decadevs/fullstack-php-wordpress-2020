<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcbcaa8c0242f18e78b8991c9eba3b46e
{
    public static $files = array (
        '51178530e2aafee5d130d06141747f80' => __DIR__ . '/../..' . '/core/functions.php',
        '5972051756107b9f261fcc9fb3d7a370' => __DIR__ . '/../..' . '/core/config.php',
        '4d85ee1ca74c9b40d62bb82aa228f3ba' => __DIR__ . '/../..' . '/core/routes.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Aura\\Session\\_Config\\' => 21,
            'Aura\\Session\\' => 13,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Aura\\Session\\_Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/session/config',
        ),
        'Aura\\Session\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/session/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcbcaa8c0242f18e78b8991c9eba3b46e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcbcaa8c0242f18e78b8991c9eba3b46e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcbcaa8c0242f18e78b8991c9eba3b46e::$classMap;

        }, null, ClassLoader::class);
    }
}
