<?php

namespace App\Http\ViewComposers;

use App\Models\Ketua_lokasi;
use App\Models\Lokasi;
use Illuminate\View\View;
use App\Repositories\UserRepository;

class UserComposer
{
    public function compose(View $view)
    {
      $lokasis = Ketua_lokasi::all();
      $no = 1;
      $lokasiWilayahs = Lokasi::all();

      $view->with(compact(['lokasis', 'no', 'lokasiWilayahs']));
    }
}