<?php

namespace App\Repositories\Dashboard\City;

interface CityInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
