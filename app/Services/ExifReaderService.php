<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Throwable;

class ExifReaderService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function fileExists(string $file): bool
    {
        if ($file = File::exists(__DIR__ . "/../../images/{$file}")) {
            return $file;
        }

        return false;
    }

    public function getFile(string $file)
    {
        try {
            return $file = File::get(__DIR__ . "/../../images/{$file}");
        } catch (Throwable $th) {
            dd($th->getMessage());
        }

        return $file;
    }
}
