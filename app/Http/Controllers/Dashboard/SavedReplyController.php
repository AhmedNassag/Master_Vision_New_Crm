<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\SavedReply\SavedReplyInterface;
use App\Http\Requests\Dashboard\SavedReply\StoreRequest;
use App\Http\Requests\Dashboard\SavedReply\UpdateRequest;

class SavedReplyController extends Controller
{
    protected $savedReply;

    public function __construct(SavedReplyInterface $savedReply)
    {
        $this->savedReply = $savedReply;
    }



    public function index(Request $request)
    {
        return $this->savedReply->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->savedReply->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->savedReply->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->savedReply->destroy($request);
    }
}
