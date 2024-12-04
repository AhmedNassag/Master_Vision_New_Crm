<?php

namespace App\Repositories\Api\Invoice;

interface InvoiceInterface
{
    public function current($request);

    public function finished($request);

    // public function index($request);

    // public function store($request);

    // public function show($request);

    // public function update($request);

    // public function destroy($request);

}
