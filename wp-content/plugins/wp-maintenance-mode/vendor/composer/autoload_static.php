<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9679a8870401cbe8d4278e6498dbd825
{
    public static $files = array (
        '7c3f92ec501ce72fe4f09265dc506991' => __DIR__ . '/..' . '/codeinwp/themeisle-sdk/load.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit9679a8870401cbe8d4278e6498dbd825::$classMap;

        }, null, ClassLoader::class);
    }
}