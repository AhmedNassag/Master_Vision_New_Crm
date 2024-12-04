<?php

namespace App\Repositories\Dashboard\Industry;

interface IndustryInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
