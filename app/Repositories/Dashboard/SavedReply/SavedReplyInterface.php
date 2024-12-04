<?php

namespace App\Repositories\Dashboard\SavedReply;

interface SavedReplyInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
