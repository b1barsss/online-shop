@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">Register form</div>

                    <div class="card-body">
                        <form action="{{ route('api.register') }}" method="POST">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input name="name" type="text" id="form2Example1" class="form-control"/>
                                <label class="form-label" for="form2Example1">Full name</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="email" type="email" id="form2Example1" class="form-control"/>
                                <label class="form-label" for="form2Example1">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="form2Example2" class="form-control"/>
                                <label class="form-label" for="form2Example2">Password</label>
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input name="c_password" type="password" id="form2Example2" class="form-control"/>
                                <label class="form-label" for="form2Example2">Confirm Password</label>
                            </div>

                            <div class="form-check form-switch">
                                <input name="admin_role" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Admin role</label>
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
