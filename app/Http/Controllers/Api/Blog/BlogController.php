<?php

namespace App\Http\Controllers\Api\Blog;

use App\Models\Point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Api\Blog\BlogInterface;
use App\Notifications\CheckPointNotification;

class BlogController extends Controller
{
    protected $blog;

    public function __construct(BlogInterface $blog)
    {
        $this->blog = $blog;
    }


    public function index(Request $request)
    {
        return $this->blog->index($request);
    }

    public function show($id)
    {
        return $this->blog->show($id);
    }
}
