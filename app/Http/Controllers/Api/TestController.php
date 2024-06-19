<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestResource;
use App\Http\Resources\CaregoriesResource;
use App\Http\Resources\UsersResource;
use App\Models\categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestController extends Controller
{
    use ApiResponsTrait;
    public function index(){
        $user  = TestResource::collection(User::query()->get());
        return $this->apiResponse($user,'Done Retrieve data','200');
    }

    public function show($id)
    {
        $user  = User::query()->find($id);
        if($user){
            return $this->apiResponse(new UsersResource($user),'Done Show User','200');
        }
        return $this->apiResponse(null,'The User Not Found!!', '404');
    }

    public function categories()
    {
        $categories = CaregoriesResource::collection(categories::query()->where('parent_id','!=',null)->get());
        return $this->apiResponse($categories,'Done Show Categories','200');
    }

}
