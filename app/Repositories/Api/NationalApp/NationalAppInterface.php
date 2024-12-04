<?php

namespace App\Repositories\Api\NationalApp;

interface NationalAppInterface
{
    public function home($id);

    public function currentInvoices($id);

    public function finishedInvoices($id);

    public function updateProfile($id, $request);
}
