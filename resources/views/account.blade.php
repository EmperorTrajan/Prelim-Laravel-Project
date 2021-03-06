@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
  <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>User Profile </h3></header>
            @if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
                <section class="row new-post">
                    <div class="col-md-6 col-md-offset-3" align="right">
                        <img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}" alt="" width="200" height="200" class="img-circle img-responsive">
                     </div>
                </section>
            @endif
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" id="last_name">
                </div>
                <div class="form-group">
                    <label for="Phone">Phone Number</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" id="phone">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="text" name="password" id="password"> <!---->
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    
@endsection