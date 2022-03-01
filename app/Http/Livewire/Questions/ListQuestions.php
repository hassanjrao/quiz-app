<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use App\Models\Speciality;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class ListQuestions extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $specialities = [];
    public $types = [];
    public $sortColumn = 'id';
    public $sortDirection = 'desc';
    public $searchColumns = [
        'question' => '',
        'speciality_id' => 0,
        'type_id' => 0
    ];

    public $confirmDelete=false;

    protected $listeners=["questionAdded"];

    public function questionAdded()
    {
        $this->render();

    }

    public function viewQuestion($id)
    {
        $this->emit("viewQuestion", $id);
        $this->dispatchBrowserEvent("scroll-top");
    }

    public function deleteQuestion($id)
    {

        if($this->confirmDelete)
        {
            $question = Question::find($id);
            $question->delete();
            $this->render();
        }
        else
        {
           $this->dispatchBrowserEvent('confirm-delete-alert');
        }
    }

    public function mount()
    {
        $this->specialities = Speciality::pluck('name', 'id');
        $this->types = Type::pluck('name', 'id');
    }

    public function sortByColumn($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->reset('sortDirection');
            $this->sortColumn = $column;
        }
    }

    public function updating($value, $name)
    {
        $this->resetPage();
    }

    public function render()
    {
        $questions = Question::select([
            'questions.question',
            'questions.id',
            'specialities.name as speciality_name',
            'speciality_id',
            "types.name as type_name",
            "type_id"
        ])
            ->leftJoin(
                'specialities',
                'questions.speciality_id',
                '=',
                'specialities.id'
            )

            ->leftJoin(
                'types',
                'questions.type_id',
                '=',
                'types.id'
            );

        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
                if ($column == 'speciality_id') {
                    $questions->where($column, $value);
                } else if ($column == 'type_id') {
                    $questions->where($column, $value);
                } else {
                    $questions->where('questions.' . $column, 'LIKE', '%' . $value . '%');
                }
            }
        }

        $questions->orderBy($this->sortColumn, $this->sortDirection);

        return view('livewire.questions.list-questions', [
            'questions' => $questions->paginate(5)
        ]);
    }
}
