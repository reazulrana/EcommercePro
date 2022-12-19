<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $labeltitle;
    public $items;
    public $fieldname;
    public $val;


    public function __construct($name, $labeltitle,$items,$fieldname,$val)
    {
        //
        $this->name=$name;
        $this->labeltitle=$labeltitle;
        $this->items=$items;
        $this->fieldname=$fieldname;
        $this->val=$val;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown');
    }
}
