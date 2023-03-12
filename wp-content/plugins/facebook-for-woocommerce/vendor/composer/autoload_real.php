<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita9d032e7e5ba5bd609a99a1da3ece2a1
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

        spl_autoload_register(array('ComposerAutoloaderInita9d032e7e5ba5bd609a99a1da3ece2a1', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita9d032e7e5ba5bd609a99a1da3ece2a1', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita9d032e7e5ba5bd609a99a1da3ece2a1::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
