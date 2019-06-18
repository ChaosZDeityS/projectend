<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita23b0ad855224852395f40df5ae8c555
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Ozdemir\\Datatables\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ozdemir\\Datatables\\' => 
        array (
            0 => __DIR__ . '/..' . '/ozdemir/datatables/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita23b0ad855224852395f40df5ae8c555::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita23b0ad855224852395f40df5ae8c555::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}