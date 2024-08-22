<?php

namespace App\Repositories\Dashboard\CustomerPortal;

interface CustomerPortalInterface
{

    // public function index($request);

    // public function show($id);

    // public function create();

    // public function store($request);

    public function edit($id);

    public function update($request);

    public function editPassword($id);

    public function updatePassword($request);

}
