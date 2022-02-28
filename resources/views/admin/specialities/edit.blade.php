@extends("layouts.admin-backend")
@section("page-title", "Edit Speciality - Admin")
@section('content')


    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Specialties</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.specialities.update', $speciality->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-8 col-xl-5">

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="label">Name</label>
                                    <input required type="text" class="form-control" id="label" name="name"
                                        value="{{ $speciality->name }}">
                                </div>
                            </div>


                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>





    </div>
    <!-- END Page Content -->


@endsection
