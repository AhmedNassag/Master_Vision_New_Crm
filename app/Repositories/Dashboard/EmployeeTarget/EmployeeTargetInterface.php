<?php

namespace App\Repositories\Dashboard\EmployeeTarget;

interface EmployeeTargetInterface
{

    public function index($request);

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

}
