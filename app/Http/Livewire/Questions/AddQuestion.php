<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use App\Models\Speciality;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class AddQuestion extends Component
{
    use WithFileUploads;

    public $choices = [];
    public $question;
    public $explanation;
    public $image;
    public $specialities;
    public $speciality;
    public $types;
    public $type;
    public $correct;

    public $oldImage;

    public $editMode = false;
    public $question_id;

    protected $rules = [
        'question' => 'required',
        'choices.*.choice' => 'required',
        'correct' => 'required',
        'speciality' => 'required',
        'type' => 'required',
        "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
    ];

    protected $messages = [
        "question.required" => "Please enter a question",
        "choices.*.choice.required" => "Please enter something",
        "correct.required" => "Please select a correct choice",
        "speciality.required" => "Please select a speciality",
        "type.required" => "Please select a type"
    ];

    protected $listeners = [
        "viewQuestion"
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

    public function viewQuestion($id)
    {
        $question = Question::find($id);

        if ($question) {
            $this->resetErrorBag();
            $this->resetValidation();

            

            $this->question_id = $question->id;
            $this->question = $question->question;
            $this->explanation = $question->explanation;
            $this->speciality = $question->speciality_id;
            $this->type = $question->type_id;

            if($question->image)
            {
                $this->image=null;
                $this->oldImage = $question->image;

            }
            else{
                $this->image=null;
                $this->oldImage = null;
            }



            $this->choices = $question->choices->toArray();

            foreach ($this->choices as $key => $choice) {
                if ($choice['is_correct'] == 1) {
                    $this->correct = $key;
                }
            }


            $this->editMode = true;
        }
    }

    public function updateQuestion()
    {
        $this->validate();

        $question = Question::find($this->question_id);

        if ($question) {

            $question->question = $this->question;
            $question->explanation = $this->explanation;
            $question->speciality_id = $this->speciality;
            $question->type_id = $this->type;

            if ($this->image) {

                if($question->image)
                {
                    Storage::delete("public/questions/".$question->image);
                }

                $file = $this->image->store("public/questions");
                $question->image = basename($file);
            }

            $question->save();



            $question->choices()->delete();

            foreach ($this->choices as $index => $choice) {

                if ($index == $this->correct) {
                    $is_correct = 1;
                } else {
                    $is_correct = 0;
                }

                $question->choices()->create([
                    'choice' => $choice['choice'],
                    'is_correct' => $is_correct
                ]);
            }

            $this->editMode = false;


            $msg = "Question #" . $this->question_id . " updated successfully";
            $type = "success";


            $this->reset();
            $this->mount();

            $this->emit('questionAdded');
        } else {
            $msg = "Invalid Question ";
            $type = "error";
        }



        $this->dispatchBrowserEvent("show-status", ["msg" => $msg, "type" => $type]);
    }


    public function addQuestion()
    {

        $this->validate();

        $question = Question::create([
            "question" => $this->question,
            "speciality_id" => $this->speciality,
            "type_id" => $this->type,
            "explanation" => $this->explanation
        ]);

        if ($this->image) {
            $file = $this->image->store("public/questions");
            $question->image = basename($file);
            $question->save();
        }



        foreach ($this->choices as $index => $choice) {

            if ($index == $this->correct) {
                $is_correct = 1;
            } else {
                $is_correct = 0;
            }


            $question->choices()->create([
                "choice" => $choice['choice'],
                "is_correct" => $is_correct
            ]);
        }

        $this->reset();
        $this->mount();

        $this->emit('questionAdded');

        $this->dispatchBrowserEvent("show-status", ["msg" => "Question added successfully", "type" => "success"]);
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
