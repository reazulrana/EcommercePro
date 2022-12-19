<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $labeltitle=null;
     public $type;
     public $placeholder=null;
     public $name;
     public $labelclass=null;
     public $inputclass;
     public $value=null;




    public function __construct($labeltitle=null,$type,$placeholder=null,$name,$labelclass=null,$inputclass,$value=null)
    {

        //
        // dd($labeltitle . " " . $type . " " . $placeholder . " ".$name . " ". $labelclass . " " . $inputclass );
        $this->labeltitle=$labeltitle;
        $this->type=$type;
        $this->placeholder=$placeholder;
        $this->name=$name;
        $this->labelclass=$labelclass;
        $this->inputclass=$inputclass;
        $this->value=$value;




    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.input');
    }
}
