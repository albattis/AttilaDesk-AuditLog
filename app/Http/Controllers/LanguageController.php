<?php

namespace App\Http\Controllers;

use App\Models\LanguageModel;
use Illuminate\Http\RedirectResponse;

class LanguageController
{
    protected LanguageModel $model;

    public function __construct(LanguageModel $model){}

    
    /**
     * Ellenörzi a választott nyelvet.
     * @param string $lang Választott nyelv.
     * @return RedirectResponse Visszairányit a meglévö nyelvvel.
     */

    public function switchLang(string $lang) : RedirectResponse
    {
        return $this->model->switchLang($lang);
    }

}
