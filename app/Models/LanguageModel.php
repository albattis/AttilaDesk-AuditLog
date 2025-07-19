<?php

namespace App\Models;

use App\services\Language\Interfaces\LanguageInterface;
use App\Services\Logs\LoggerService;
use Exception;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Monolog\Logger;

class LanguageModel implements LanguageInterface
{

    protected LoggerService $logger;

    public function __construct()
    {
        $this->logger=new LoggerService();
    }

    /**
     * Ellenörzi a választott nyelvet.
     * @param string $lang Választott nyelv.
     * @return RedirectResponse Visszairányit a meglévö nyelvvel.
     */
    public function switchLang(string $lang) :RedirectResponse
    {

        $availableLang=['hu','en'];
        if(in_array($lang,$availableLang))
        {
            Session::put('locale',$lang);
            App::SetLocale($lang);
            $this->logger->info("Nyelv sikeresen beállitva.",[
                'user_ip'=>request()->ip(),
                'method'=> __METHOD__,
                'language'=>$lang
            ]);
        }
        else
           {
             $this->logger->error("Hibás vagy érvénytelen nyelv választás",[
                 'user_ip'=>request()->ip(),
                 'method'=> __METHOD__,
                 'language'=>$lang
             ]);
            }


        return Redirect::back();
    }



}
