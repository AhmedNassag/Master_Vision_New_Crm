<?php

namespace App\Repositories\Dashboard\Country;

interface CountryInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
