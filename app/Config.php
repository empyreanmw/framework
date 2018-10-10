<?php


namespace App;


use Symfony\Component\Finder\Finder;

class Config
{
    protected static $finder;
    protected static $files;
    /**
     * Config constructor.
     */
    public function __construct()
    {
        self::$finder = new Finder();
    }

    public static function grab($key)
    {
        self::findFiles();

        return dot(require self::$files[$key]);
    }

    public static function findFiles()
    {
        $finder = new Finder();

        $files = $finder->files()->in('core/config');

        foreach ($files as $file) {
            $key = pathinfo($file->getRelativePathname(), PATHINFO_FILENAME);

            self::$files[$key] = $file;
        }
    }
}