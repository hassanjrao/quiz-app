<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;

class AddQuestion extends Component
{

    public $choices=[];
    public $question;


    public function addChoice(){
        $this->choices[]=['choice'=>'','is_correct'=>false];
    }

    public function removeChoice($index){
        unset($this->choices[$index]);

        $this->choices=array_values($this->choices);

    }


    public function mount(){
        $this->choices[]=["choice"=>"","is_correct"=>""];

    }


    public function render()
    {
        return view('livewire.questions.add-question');
    }
}
