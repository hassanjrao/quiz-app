<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">
            Add New Question
        </h3>
    </div>
    <div class="block-content block-content-full">

        <form wire:submit.prevent='addQuestion'>

            <div class="row push">

                <div class="col-lg-12 mb-4">
                    <div wire:ignore>
                        <textarea x-data="ckeditor()" placeholder="Type question" x-init="init($dispatch)"
                            wire:key="ckEditor" x-ref="ckEditor" wire:model.debounce.9999999ms="question"
                            class="form-control
                            @error('question') is-invalid @enderror"
                            name="description">content</textarea>
                    </div>

                    @error('question')
                        <div class="text-danger font-weight-bold">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <select class="form-select" id="speciality" wire:model="speciality">
                            <option value="">Select Speciality</option>

                            @foreach ($specialities as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    @error('speciality')
                        <div class="text-danger font-weight-bold">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="col-lg-6 mb-4">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-select" id="type" wire:model="type">
                            <option value="">Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('type')
                        <div class="text-danger font-weight-bold">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-lg-12 mt-2">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Choice</th>
                                    <th class="text-center">Correct</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($choices as $index => $choice)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $i++ }}</td>
                                        <td>
                                            <input type="text" class="form-control"
                                                wire:model='choices.{{ $index }}.choice'>
                                            @error('choices.' . $index . '.choice')
                                                <div class="text-danger font-weight-bold">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td class="text-center fs-sm">

                                            <input class="form-check-input" type="radio" value="{{ $index }}"
                                                wire:model="correct" id="choices[{{ $index }}][is_correct]">


                                        </td>

                                        <td class="text-center fs-sm">

                                            <div class="btn-group">



                                                <button type="button"
                                                    wire:click.prevent="removeChoice({{ $index }})"
                                                    class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip"
                                                    title="Delete">

                                                    <div wire:loading wire:target="removeChoice({{ $index }})">

                                                        <div class="spinner-border spinner-border-sm text-danger"
                                                            role="status">
                                                        </div>
                                                    </div>
                                                    <div wire:target="removeChoice({{ $index }})"
                                                        wire:loading.remove>

                                                        <i class="fa fa-fw fa-times"></i>
                                                    </div>
                                                </button>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                        @error('correct')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button wire:click.prevent="addChoice" wire:loading.attr="disabled"
                        class="btn btn-sm btn-alt-success mb-4 mt-3">

                        + Add Choice

                        <div wire:loading wire:target="addChoice">

                            <div class="spinner-border text-success" role="status">

                                <span></span>

                            </div>

                        </div>

                    </button>

                </div>


                <div class="col-lg-12 text-end">

                    <button type="submit" class="btn btn-alt-primary" wire:loading.attr='disabled'>
                        <div wire:loading wire:target='addQuestion'>

                            <div class="spinner-border text-primary" role="status">

                                <span></span>

                            </div>

                        </div>
                        <div wire:loading.remove wire:target='addQuestion'>

                            <i class="fa fa-fw fa-save"></i> Add

                        </div>
                    </button>
                </div>



            </div>

        </form>


    </div>
</div>
