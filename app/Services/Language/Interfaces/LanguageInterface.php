<?php

namespace App\Services\Language\Interfaces;

use Illuminate\Http\RedirectResponse;

interface LanguageInterface
{
    /**
     * Ellenörzi a választott nyelvet.
     * @param string $lang Választott nyelv.
     * @return RedirectResponse Visszairányit a meglévö nyelvvel.
     */
    public function switchLang(string $lang) :RedirectResponse;
}
