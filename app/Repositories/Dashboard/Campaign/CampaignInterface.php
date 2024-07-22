<?php

namespace App\Repositories\Dashboard\Campaign;

interface CampaignInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

    public function reTarget();

    public function getReTarget($request);

    public function reTargetSelected($request);

}
