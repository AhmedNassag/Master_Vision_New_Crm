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
        $this->middleware('permission:عرض الحملات', ['only' => ['index']]);
        $this->middleware('permission:إضافة الحملات', ['only' => ['store']]);
        $this->middleware('permission:تعديل الحملات', ['only' => ['update']]);
        $this->middleware('permission:حذف الحملات', ['only' => ['destroy']]);
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



    public function reTarget()
    {
        return $this->campaign->reTarget();
    }



    public function getReTarget(Request $request)
    {
        return $this->campaign->getReTarget($request);
    }



    public function reTargetSelected(Request $request)
    {
        return $this->campaign->reTargetSelected($request);
    }
}
