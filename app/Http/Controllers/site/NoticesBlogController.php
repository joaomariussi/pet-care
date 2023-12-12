<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\admin\NoticesBlog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class NoticesBlogController extends Controller
{

    /*
     * @var NoticesBlog
     */
    public function viewDetailsNotices($id): View|Factory|Application|RedirectResponse
    {
        try {
            $noticeBlog = NoticesBlog::query()->where('id', $id)->first();
            return view('site.notices-blog.view-details-notices', compact('noticeBlog'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back();
        }
    }

}
