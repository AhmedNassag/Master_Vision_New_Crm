<?php

namespace App\Repositories\Dashboard\Area;

interface AreaInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

    public function areaByCityId($id);

}
