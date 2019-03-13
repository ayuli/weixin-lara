<?php 
namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redis;
use App\model\UserModel;

class moContorller extends Controller
{


    public function head()
    {
        return view('layouts.head');
    }

    public function left()
    {
        return view('layouts.left');
    }

    public function foot()
    {
        return view('layouts.foot');
    }

    public function main()
    {
        return view('layouts.main');
    }







}

