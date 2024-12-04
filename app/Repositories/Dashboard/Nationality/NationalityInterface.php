<?php

namespace App\Repositories\Dashboard\Nationality;

interface NationalityInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
