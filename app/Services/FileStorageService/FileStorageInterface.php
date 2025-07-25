<?php

namespace App\Services\FileStorageService;

use Illuminate\Http\UploadedFile;


/**
 * Fájl mentése a storage mappába
 * @param UploadedFile $file Menteni kivánt file
 * @return bool TRUE ha sikeres a mentés, FALSE ha nem.
 */
interface FileStorageInterface
{
    public function fileSaveStorage(UploadedFile $file) : bool;
}