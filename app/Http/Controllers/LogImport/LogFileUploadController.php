<?php

namespace App\Http\Controllers\LogImport;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogFileUploadRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use App\Services\LogFileValidator\LogFileValidator;
use App\Services\FileStorageService\FileStorageService;

class LogFileUploadController extends Controller
{
    /**
     * File tipus ellenörzés
     * @return bool True Ha sikeres kiterjesztés false ha nem.
     */

    protected LogFileValidator $validator;

    public function __construct(LogFileValidator $validator)
    {
        $this->validator=$validator;
    }


    /**Beillesztett file ellenörzése méret tipus szerint.
     *
     * @param Request $request A kérés.
     * 
     * @return JsonResponse A validáció eredménye Json válaszban
     */
    public function logFileUpload(LogFileUploadRequest $request) : JsonResponse 
    {
            $file=$request->file('logfile');
            if(!$file instanceof UploadedFile)
            {
                return response()->json([
                    'success'=>false,
                    'error'=>['logfile'=>['No file uploaded']]
                ],400);
            }

            if(!$this->validator->validateFileType($file))
            {
                return response()->json([
                    'success'=> false,
                    'error' =>['logfile'=>['Is not supported file format.']]
                ],422);
            }
            if(!$this->validator->validateFileSize($file))
            {
                return response()->json([
                    'success'=>false,
                    'error'=>['logfile'=>['Is too big file.']]
                ],413);
            }
          $storageService = app(FileStorageService::class);
          $storedPath = $storageService->fileSaveStorage($file);

            if (!$storedPath) {
                    return response()->json([
                    'success' => false,
                    'error' => ['logfile' => ['File could not be saved.']],
                    ], 500);
                }

        return response()->json([
                  'success' => true,
                  'message' => 'File is valid and stored.',
                  'path' => $storedPath,
                  ], 200);
    }
}
 