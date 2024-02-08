<?php

namespace App\Repositories\Dashboard\Contact;

interface ContactInterface
{

    public function index($request);

    public function show($id);

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

    public function deleteSelected($request);

    public function trashSelected($request);

    public function activateSelected($request);

    public function relateSelected($request);

    public function changeActive($request);

    public function changeTrash($request);

    public function relateEmployee($request);

    public function trashed($request);

}
