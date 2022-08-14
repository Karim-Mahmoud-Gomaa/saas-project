<?php

namespace Modules\PageBuilder\View\Components\DefaultTheme\Layouts;

use Illuminate\View\Component;

class main extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    protected function loadThemeSettings(){
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('pagebuilder::components.defaulttheme/layouts/main');
    }
}
