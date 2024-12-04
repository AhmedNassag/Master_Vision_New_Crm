<?php

namespace App\Repositories\Dashboard\ContactSource;

interface ContactSourceInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
