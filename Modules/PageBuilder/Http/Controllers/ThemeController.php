<?php

namespace Modules\PageBuilder\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PageBuilder\Entities\Theme;
use Modules\PageBuilder\Transformers\ThemeCollection;
use Modules\PageBuilder\Transformers\ThemeResource;

class ThemeController extends Controller
{
    protected $file;

    public function __construct()
    {
        $this->file = new Filesystem();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $themes = Theme::all();
        return response([
            'themes' => new ThemeCollection($themes),
            'message' => 'success'
        ], 200);
    }

    public function synchronise(){
        $path = base_path('Modules\\PageBuilder\\View\\Components');
        // search for directories in the views/components directory
        $file = new Filesystem();

        $themeDirs = $file->directories($path);

        $themes = [];
        foreach($themeDirs as $theme){
            $filename = $file->name($theme);
            $themes[] = ['name'=>$filename];
        }
        foreach($themes as $temp){
            $themeSettings = $this->getThemeDefaultSettings($temp['name']);

            // check theme name in database
            if(!$theme = Theme::where('name',$temp['name'])->first()){
                // dd($temp['name']);
                $theme = Theme::create(['name'=>$temp['name']]);
                $this->setThemeDefaultSettings($theme);
            }
        }

        $themes = Theme::all();
        return response([
            'themes' => new ThemeCollection($themes),
            'message' => 'success',
            'success' => 'Themes Data Synschronised',
        ], 200);

    }

    public function resetThemeDefaults(Theme $theme){
        $this->setThemeDefaultSettings($theme);
        $theme = Theme::find($theme->id);
        return response([
            'theme' => new ThemeResource($theme),
            'message' => 'success',
            'success' => 'Theme Default Settings Reset',
        ], 200);
    }

    public function setThemeDefaultSettings(Theme $theme){
        $defaults = $this->getThemeDefaultSettings($theme->name);
        $theme->update([
            'layout'=>$defaults->layout?$defaults->layout:'',
            'header'=>$defaults->header?$defaults->header:'',
            'footer'=>$defaults->footer?$defaults->footer:'',
        ]);
    }

    /**
     * getThemeDefaultSettings
     * Return the default theme settings defined in theme_info.json within the theme's class view directory
     *
     * @param  string $themeName Name of the theme
     * @return object $defaultSettings array of default theme settings
     */
    public function getThemeDefaultSettings($themeName){
        $themePath = base_path('Modules\\PageBuilder\\View\\Components\\'.$themeName);
        $defaultSettings = json_decode(file_get_contents($themePath.'\\theme_info.json'));

        return $defaultSettings;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pagebuilder::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('pagebuilder::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('pagebuilder::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
