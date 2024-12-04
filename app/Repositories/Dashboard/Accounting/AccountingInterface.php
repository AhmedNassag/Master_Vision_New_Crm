<?php

namespace App\Repositories\Dashboard\Accounting;

interface AccountingInterface
{

    public function invoice($id);

    public function receipt($id);
    
}
