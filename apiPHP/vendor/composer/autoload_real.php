<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite6f6a6a555556d4ef2d00baf86241433
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

        spl_autoload_register(array('ComposerAutoloaderInite6f6a6a555556d4ef2d00baf86241433', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite6f6a6a555556d4ef2d00baf86241433', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite6f6a6a555556d4ef2d00baf86241433::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}