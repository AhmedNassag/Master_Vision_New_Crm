<?php

namespace App\Repositories\Dashboard\Branch;

interface BranchInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
