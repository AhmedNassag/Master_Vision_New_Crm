<?php

namespace App\Repositories\Dashboard\Blog;

interface BlogInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
