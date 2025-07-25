<?php

namespace App\Services\LogFileValidator;

use Illuminate\Http\UploadedFile;

interface LogFileValidatorInterface
{


    /**
     * A fájl kiterjesztásáenk ellenörzése.
     * 
     * @return bool TRUE ha log vagy txt  a fájl FALSE ha nem.
     */
    public function validateFileType(UpLoadedFile $file) : bool;

    /**
     * A fálj méretének validálása
     * 
     * @param UploadedFile $file A validálni kivánt file.
     * @return bool TRUE ha megfelelö a méret FALSE ha nem.
     */
    public function validateFileSize(UploadedFile $file) : bool;
}