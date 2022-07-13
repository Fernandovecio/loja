<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit755f12a638c596ce79cf2d79ba62b176
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit755f12a638c596ce79cf2d79ba62b176', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit755f12a638c596ce79cf2d79ba62b176', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit755f12a638c596ce79cf2d79ba62b176::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}