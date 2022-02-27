<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use App\Models\Speciality;
use App\Models\Type;
use Livewire\Component;

class AddQuestion extends Component
{

    public $choices = [];
    public $question;
    public $specialities;
    public $speciality;
    public $types;
    public $type;
    public $correct;

    protected $rules = [
        'question' => 'required',
        'choices.*.choice' => 'required',
        'correct' => 'required',
        'speciality' => 'required',
        'type' => 'required'
    ];

    protected $messages = [
        "question.required" => "Please enter a question",
        "choices.*.choice.required" => "Please enter something",
        "correct.required" => "Please select a correct choice",
        "speciality.required" => "Please select a speciality",
        "type.required" => "Please select a type"
    ];


    public function addChoice()
    {
        $this->choices[] = ['choice' => '', 'is_correct' => ''];
    }

    public function removeChoice($index)
    {
        unset($this->choices[$index]);

        $this->choices = array_values($this->choices);
    }


    public function addQuestion()
    {

        $this->validate();

        $question = Question::create([
            "question" => $this->question,
            "speciality_id" => $this->speciality,
            "type_id" => $this->type,
        ]);

        foreach ($this->choices as $index=> $choice) {

            if($index==$this->correct){
                $is_correct = 1;
            }else{
                $is_correct = 0;
            }


            $question->choices()->create([
                "choice" => $choice['choice'],
                "is_correct" => $is_correct
            ]);
        }

        $this->dispatchBrowserEvent("show-status",["msg"=>"Question added successfully","type"=>"success"]);
    }


    public function mount()
    {
        $this->choices[] = ["choice" => "", "is_correct" => ""];

        $this->specialities = Speciality::all();
        $this->types = Type::all();
    }


    public function render()
    {
        return view('livewire.questions.add-question');
    }
}
