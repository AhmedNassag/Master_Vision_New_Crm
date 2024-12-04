<?php

namespace App\Repositories\Dashboard\Major;

interface MajorInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

    public function majorByIndustryId($id);

}
