<?php

namespace App\Repositories\Dashboard\Support;

interface SupportInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
