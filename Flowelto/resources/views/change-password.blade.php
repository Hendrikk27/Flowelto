@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-8"> 
            <div class="header" style="text-align: center; font-size: 30px; font-weight: bold; margin-bottom:20px">Change Password</div>
                <form action="{{url('change-password')}}" class="d-flex flex-column" method="POST">
                    @csrf
                    <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Your Password') }}</label>

                            <div class="col-md-6">
                                <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="oldpassword">

                                @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword"  required autocomplete="newpassword">

                                @error('newpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                            <div class="col-md-6">
                                <input id="confirmpassword" type="password" class="form-control @error('confirmpassword') is-invalid @enderror" name="confirmpassword" required autocomplete="confirmpassword">

                                @error('confirmpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-right:120px;margin-top:20px">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </div>


                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </div> --}}
                    {{-- <h4>
                        Change Password
                    </h4>
                    <table class="text-left">
                        <tr>
                            <td>Your Password</td>
                            <td>
                                <input type="password" name="old_password" id="old_password" class="form-control">

                                @error('old_password')
                                    <span class="error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>New Password</td>
                            <td>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm New Password</td>
                            <td>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                <input type="submit" value="Change Password" class="btn btn-primary">
                            </td>
                        </tr>
                    </table> --}}
                </form>
            
        </div>
    </div>
</div>
@endsection
