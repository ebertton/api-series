<?php

namespace App\Http\Controllers;
use App\Models\Episodes;
use Laravel\Lumen\Routing\Controller;
class EpisodesController extends BaseController {

    public function __construct()
    {
        $this->class = Episodes::class;
    }
}
