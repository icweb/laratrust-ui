@extends('trusty::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create User Form</div>

                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Full Name <span class="required text-danger small">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', '') }}" placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address <span class="required text-danger small">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', '') }}" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password <span class="required text-danger small">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password <span class="required text-danger small">*</span></label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection