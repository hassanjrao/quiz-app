<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">
            Questions ({{ $questions->total() }})
        </h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
        <div class="table-responsive">

            <table class="table table-bordered table-striped table-vcenter fs-sm">
                <thead>
                    <tr>
                        <th style="width: 10%; cursor: pointer;" wire:click="sortByColumn('id')">

                            Id
                            @if ($sortColumn == 'id')
                                <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'down' : 'up' }}"
                                    style="color:blue"></i>
                            @else
                                <i class="fa fa-fw fa-sort" style="color:black"></i>
                            @endif
                        </th>
                        <th class="text-center" style="width: 40%; cursor: pointer;"
                            wire:click="sortByColumn('question')">
                            Question
                            @if ($sortColumn == 'question')
                                <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'down' : 'up' }}"
                                    style="color:blue"></i>
                            @else
                                <i class="fa fa-fw fa-sort" style="color:black"></i>
                            @endif
                        </th>
                        <th class="text-center" style="width: 20%; cursor: pointer;"
                            wire:click="sortByColumn('speciality_name')">
                            Speciality
                            @if ($sortColumn == 'speciality_name')
                                <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'down' : 'up' }}"
                                    style="color:blue"></i>
                            @else
                                <i class="fa fa-fw fa-sort" style="color:black"></i>
                            @endif
                        </th>
                        <th class="text-center" style="width: 20%; cursor: pointer;"
                            wire:click="sortByColumn('type_name')">
                            Type
                            @if ($sortColumn == 'type_name')
                                <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'down' : 'up' }}"
                                    style="color:blue"></i>
                            @else
                                <i class="fa fa-fw fa-sort" style="color:black"></i>
                            @endif
                        </th>
                        <th class="text-center" style="width: 12%;">
                            Actions
                        </th>


                    </tr>
                    <tr>
                        <td>
                            <input type="text" placeholder="" class="form-control" wire:model="searchColumns.id" />

                        </td>
                        <td>
                            <input type="text" placeholder="Type question to search..." class="form-control"
                                wire:model="searchColumns.question" />
                        </td>

                        <td>
                            <select class="form-select" wire:model="searchColumns.speciality_id">
                                <option value="">Select Speciality </option>
                                @foreach ($specialities as $id => $speciality)
                                    <option value="{{ $id }}">{{ $speciality }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <select class="form-select" wire:model="searchColumns.type_id">
                                <option value="">Select Type </option>
                                @foreach ($types as $id => $type)
                                    <option value="{{ $id }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{!! $question->question !!}</td>
                            <td>{{ $question->speciality->name ?? '' }}</td>
                            <td>{{ $question->type->name ?? '' }}</td>

                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                    wire:click='viewQuestion({{ $question->id }})' data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="View">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>


                                <form id="form-{{ $question->id }}"
                                    action="{{ route('admin.questions.destroy', $question->id) }}"
                                    method="POST">
                                    @method("DELETE")
                                    @csrf

                                    <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" data-bs-original-title="Delete" onclick="confirmDelete({{ $question->id }})">
                                        <i class="fa fa-fw fa-times"></i>
                                    </a>

                                </form>



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $questions->links() }}



        </div>
    </div>




</div>

{{-- @section('js-after')
<script>
    window.addEventListener('confirm-delete-alert', event => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                @confirmDelete = true
                Swal.fire(
                    'Deleted!',
                    'The question has been deleted.',
                    'success'
                )
            }
        })
    })
</script>
@endsection --}}
