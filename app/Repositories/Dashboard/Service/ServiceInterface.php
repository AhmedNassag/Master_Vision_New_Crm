<?php

namespace App\Repositories\Dashboard\Service;

interface ServiceInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

    public function serviceByInterestId($id);

}
