<?php

namespace App\Repositories\Dashboard\Activity;

interface ActivityInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
