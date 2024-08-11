<?php

namespace App\Repositories\Dashboard\Tag;

interface TagInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
