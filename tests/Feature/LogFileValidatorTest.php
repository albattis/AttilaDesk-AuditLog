<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\LogFileValidator\LogFileValidator;
use Illuminate\Http\UploadedFile;

class LogFileValidatorTest extends TestCase
{
    protected LogFileValidator $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = new LogFileValidator();
    }

    public function test_validateFileType_accepts_valid_extensions()
    {
        $fileLog = UploadedFile::fake()->create('example.log');
        $fileTxt = UploadedFile::fake()->create('example.txt');

        $this->assertTrue($this->validator->validateFileType($fileLog));
        $this->assertTrue($this->validator->validateFileType($fileTxt));
    }

    public function test_validateFileType_rejects_invalid_extension()
    {
        $file = UploadedFile::fake()->create('example.pdf');

        $this->assertFalse($this->validator->validateFileType($file));
    }

    public function test_validateFileSize_accepts_file_under_limit()
    {
        $file = UploadedFile::fake()->create('example.log', 1024); // 1 KB

        $this->assertTrue($this->validator->validateFileSize($file));
    }

    public function test_validateFileSize_rejects_file_over_limit()
    {
        $file = UploadedFile::fake()->create('example.log', 6 * 1024); // 6 MB

        $this->assertFalse($this->validator->validateFileSize($file));
    }
}
