@extends('layouts.app')

@section('title','Sign up')

@section('content')
   <!-- Page Content -->
   <div class="bg-primary-dark">
    <div class="row g-0 bg-primary-dark-op">

      <!-- Main Section -->
      <div class="hero-static col-lg-12 d-flex flex-column align-items-center bg-body-light">
        <div class="p-3 w-100 text-center">
          <a class="link-fx fw-semibold fs-3 text-dark" href="index.html">
            Quiz<span class="fw-normal">App</span>
          </a>
        </div>
        <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
          <div class="w-100">
            <!-- Header -->
            <div class="text-center mb-5">
              {{-- <p class="mb-3">
                <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
              </p> --}}
              <h1 class="fw-bold mb-2">
                Create Account
              </h1>
              <p class="fw-medium text-muted">
                Existing user?, please <a href="{{ route('login') }}">Log in</a>.
            </p>
            </div>
            <!-- END Header -->

            <!-- Sign Up Form -->
            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <div class="row g-0 justify-content-center">
              <div class="col-sm-8 col-xl-4">
                <form class="js-validation-signup" method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="mb-4">
                    <input type="text" class="form-control form-control-lg form-control-alt py-3" id="fullname" name="name" placeholder="Full Name">
                    @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="mb-4">
                    <input type="email" class="form-control form-control-lg form-control-alt py-3" id="email" name="email" placeholder="Email">
                    @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="mb-4">
                    <input type="password" class="form-control form-control-lg form-control-alt py-3" id="password" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                  <div class="mb-4">
                    <input type="password" class="form-control form-control-lg form-control-alt py-3" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    @if ($errors->has('password_confirmation'))
                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                  </div>
                  <div class="mb-4">
                    <div class="d-md-flex align-items-md-center justify-content-md-between">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="terms" name="terms">
                        <label class="form-check-label" for="terms">I agree to Terms &amp; Conditions</label><br>
                        @if ($errors->has('terms'))
                          <span class="text-danger">{{ $errors->first('terms') }}</span>
                        @endif
                      </div>
                      <div class="py-2">
                        <a class="fs-sm fw-medium" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#one-terms">View Terms</a>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-alt-success">
                      <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Sign Up
                    </button>
                  </div>
                </form>
                <br/>
                @if(session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
              </div>
            </div>
            <!-- END Sign Up Form -->
          </div>
        </div>
        <div class="px-4 py-3 w-100 d-flex flex-column flex-sm-row justify-content-between fs-sm text-center text-sm-start">
          <p class="fw-medium text-black-50 py-2 mb-0">
            <strong>Quiz App</strong> &copy; <span data-toggle="year-copy"></span>
          </p>
          <ul class="list list-inline py-2 mb-0">
            <li class="list-inline-item">
              <a class="text-muted fw-medium" href="javascript:void(0)">Legal</a>
            </li>
            <li class="list-inline-item">
              <a class="text-muted fw-medium" href="javascript:void(0)">Contact</a>
            </li>
            <li class="list-inline-item">
              <a class="text-muted fw-medium" href="javascript:void(0)">Terms</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- END Main Section -->
    </div>

    <!-- Terms Modal -->
    <div class="modal fade" id="one-terms" tabindex="-1" role="dialog" aria-labelledby="one-terms" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
        <div class="modal-content">
          <div class="block block-rounded block-transparent mb-0">
            <div class="block-header block-header-default">
              <h3 class="block-title">Terms &amp; Conditions</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                  <i class="fa fa-fw fa-times"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
              <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
              <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
              <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
              <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            </div>
            <div class="block-content block-content-full text-end bg-body">
              <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">I Agree</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END Terms Modal -->
  </div>
  <!-- END Page Content -->
@endsection
