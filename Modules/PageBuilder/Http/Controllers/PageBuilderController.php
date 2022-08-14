<?php

namespace Modules\PageBuilder\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PageBuilder\Entities\Page;

class PageBuilderController extends Controller
{
    public $page;
    public $blocks;

    public function __construct($slug=null)
    {
        $this->getPage($slug);
    }

    public function getPage($slug){
        if (empty($slug)) {
            // Get home page if slug is empty
            $page = Page::where('is_home', true)->first();
        }else{
            // Get the page according to the slug value
            $page = Page::where('slug', $slug)->first();
        }
        // If we can't retrieve anything, Get the default 404 not found page
        if (!$page) {
            $page = Page::where('is_404', true)->first();
        }

        if(!$page){
           return false;
        }
        $this->page = $page;
        $this->blocks = $this->page->blocks()->get();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // dd('hello');
        return view('pagebuilder::components.defaulttheme.index',[
            'page'=>$this->page,
            'blocks'=>$this->blocks,
        ]);
    }
}
