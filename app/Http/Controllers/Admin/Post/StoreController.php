<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
