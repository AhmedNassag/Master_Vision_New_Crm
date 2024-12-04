<?php

namespace App\Repositories\Dashboard\WhatsappBusiness;

interface WhatsappBusinessInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
