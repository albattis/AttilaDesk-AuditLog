<?php

namespace App\Services\FileStorageService;

use Illuminate\Http\UploadedFile;

class FileStorageService implements FileStorageInterface
{


/**
 * Fájl mentése a storage mappába
 * @param UploadedFile $file Menteni kivánt file
 * @return bool TRUE ha sikeres a mentés, FALSE ha nem.
 */

    public function fileSaveStorage(UploadedFile $file): bool
    {
        $filename=now()->format('Ymd_His').' '.$file->getClientOriginalName();
        return $file->storeAs('logs/uploads',$filename);
    }
}
