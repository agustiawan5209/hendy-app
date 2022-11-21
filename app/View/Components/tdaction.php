<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tdaction extends Component
{
    public $edit, $detail, $delete;
    public $routeEdit, $routeDelete ='', $routeDetail ,$idDelete;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($edit = false, $detail = false, $delete = false,$routeEdit = "", $routeDelete = "", $routeDetail = "", $idDelete = '')
    {
        $this->edit = $edit;
        $this->detail = $detail;
        $this->delete = $delete;
        $this->routeDelete = $routeDelete;
        $this->routeDetail = $routeDetail;
        $this->routeEdit = $routeEdit;
        $this->idDelete = $idDelete;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tdaction');
    }
}
