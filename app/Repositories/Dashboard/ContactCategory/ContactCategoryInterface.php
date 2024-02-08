<?php

namespace App\Repositories\Dashboard\ContactCategory;

interface ContactCategoryInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
