<?php

namespace App\Services\LogFileValidator;

use Illuminate\Http\UploadedFile;

class LogFileValidator implements LogFileValidatorInterface
{

    protected array $fileExtends=['log','txt'];
    protected int $fileSize;

    public function __construct()
    {
    $this->fileSize=5*1024*1024;
    }

    public function validateFileSize(UploadedFile $file): bool
    {
        return $file->getSize() <= $this->fileSize;
    }

    public function validateFileType(UploadedFile $file): bool
    {
       
        $extension = strtolower($file->getClientOriginalExtension());
        return in_array($extension, $this->fileExtends);
    }
}