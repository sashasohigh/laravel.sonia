@extends('layout')

@section('main')
<div class="container d-flex align-items-center" style="min-height: 100vh;">
    <div class="row w-100 justify-content-center">
        <div class="col-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Register</h4>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('register.submit') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username_input">Username</label>
                            <input type="text" name="username" class="form-control" id="username_input" required placeholder="Enter username">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="phone_input">Phone number</label>
                            <input type="number" name="phone" class="form-control" id="phone_input" required placeholder="Enter phone number">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <p><a href="{{ route('page', ['link' => 'test']) }}">asd</a></p> --}}
</div>
@endsection