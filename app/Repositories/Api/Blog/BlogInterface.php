<?php

namespace App\Repositories\Api\Blog;

interface BlogInterface
{

    public function index($request);

    public function store($request);

    public function show($request);

    public function update($request);

    public function destroy($request);

}
