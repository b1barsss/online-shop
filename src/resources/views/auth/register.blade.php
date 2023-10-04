@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        <div class="h4">Register form</div>
                    </div>


                    <div class="card-body">
                        <form action="{{ route('api.register') }}" method="POST">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input name="name" type="text" id="name" class="form-control"/>
                                <label class="form-label" for="name">Full name</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="email" type="email" id="email" class="form-control"/>
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="password" class="form-control"/>
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input name="c_password" type="password" id="c_password" class="form-control"/>
                                <label class="form-label" for="c_password">Confirm Password</label>
                            </div>

                            <div class="form-check form-switch">
                                <input name="admin_role" class="form-check-input" type="checkbox" id="admin_role">
                                <label class="form-check-label" for="admin_role">Admin role</label>
                            </div>
                            <br>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Are you a member? <a href="/login">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
