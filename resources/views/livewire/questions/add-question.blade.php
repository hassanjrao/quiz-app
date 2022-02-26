<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">
            Add New Question
        </h3>
    </div>
    <div class="block-content block-content-full">

        <form action="">

            <div class="row push">

                <div class="col-lg-12 mb-4">
                    <div wire:ignore>
                        <textarea x-data="ckeditor()" placeholder="Type question" x-init="init($dispatch)"
                            wire:key="ckEditor" x-ref="ckEditor" wire:model.debounce.9999999ms="question"
                            class="form-control
                            @error('question') is-invalid @enderror"
                            name="description">content</textarea>
                    </div>
                </div>

                <div class="col-lg-12">

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
                                        </td>
                                        <td class="text-center fs-sm">
                                            <input type="radio" name="correctChoice" class="form-check-input"
                                                wire:model="choices.{{ $index }}.is_correct">
                                        </td>

                                        <td class="text-center fs-sm">

                                            <div class="btn-group">



                                                <button type="button"
                                                    wire:click.prevent="removeChoice({{ $index }})"
                                                    name="cards[][delete]" class="btn btn-sm btn-alt-danger"
                                                    data-bs-toggle="tooltip" title="Delete">

                                                    <div wire:loading wire:target="removeChoice({{ $index }})">

                                                        <div class="spinner-border spinner-border-sm text-danger"
                                                            role="status">
                                                        </div>
                                                    </div>
                                                    <div wire:target="removeChoice({{ $index }})" wire:loading.remove>

                                                        <i class="fa fa-fw fa-times"></i>
                                                    </div>
                                                </button>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                    <button wire:click.prevent="addChoice" wire:loading.attr="disabled"
                        class="btn btn-sm btn-alt-success mb-4 mt-2">

                        + Add Choice

                        <div wire:loading wire:target="addChoice">

                            <div class="spinner-border text-success" role="status">

                                <span></span>

                            </div>

                        </div>

                    </button>

                </div>



            </div>

        </form>


    </div>
</div>
