<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\WhatsappBusiness\WhatsappBusinessInterface;
use App\Http\Requests\Dashboard\WhatsappBusiness\StoreRequest;
use App\Http\Requests\Dashboard\WhatsappBusiness\UpdateRequest;

class WhatsappBusinessController extends Controller
{
    protected $whatsappBusiness;

    public function __construct(WhatsappBusinessInterface $whatsappBusiness)
    {
        $this->whatsappBusiness = $whatsappBusiness;
    }



    public function index(Request $request)
    {
        return $this->whatsappBusiness->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->whatsappBusiness->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->whatsappBusiness->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->whatsappBusiness->destroy($request);
    }
}
