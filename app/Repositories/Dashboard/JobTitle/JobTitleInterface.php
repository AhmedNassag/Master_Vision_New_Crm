<?php

namespace App\Repositories\Dashboard\JobTitle;

interface JobTitleInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
