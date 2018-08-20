<?php


class Redirect
{
    public static function to($location)
    {
        return header("Location: " . $location);
    }

    public function back()
    {
        return header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}