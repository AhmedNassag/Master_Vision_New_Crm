<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Campaign\CampaignInterface;
use App\Http\Requests\Dashboard\Campaign\StoreRequest;
use App\Http\Requests\Dashboard\Campaign\UpdateRequest;

class CampaignController extends Controller
{
    protected $campaign;

    public function __construct(CampaignInterface $campaign)
    {
        $this->campaign = $campaign;
    }



    public function index(Request $request)
    {
        return $this->campaign->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->campaign->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->campaign->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->campaign->destroy($request);
    }
}
