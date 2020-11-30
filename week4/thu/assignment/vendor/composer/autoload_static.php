<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit01fd47d032300437a43aa16669497489
{
    public static $files = array (
        '5972051756107b9f261fcc9fb3d7a370' => __DIR__ . '/../..' . '/core/config.php',
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit01fd47d032300437a43aa16669497489::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit01fd47d032300437a43aa16669497489::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit01fd47d032300437a43aa16669497489::$classMap;

        }, null, ClassLoader::class);
    }
}
