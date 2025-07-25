<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogFileUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
            'logfile' => 'required|file|mimes:log,txt|max:5120', // max 5MB
        ];
    }
      public function messages(): array
    {
        return [
            'logfile.required' => 'Log fájl feltöltése kötelező.',
            'logfile.file' => 'Érvényes fájlt kell feltölteni.',
            'logfile.mimes' => 'Csak log vagy txt kiterjesztésű fájlok engedélyezettek.',
            'logfile.max' => 'A fájl mérete nem haladhatja meg az 5 MB-ot.',
        ];
    }
}
