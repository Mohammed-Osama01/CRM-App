@extends('site.master')
@section('title', 'Add Customers | ' . env('APP_NAME'))

@section('content')
    <h1 class="mt-4 text-center" style="color: #4a6fdc;">Create New Customer</h1>
    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <label for="floatingInput">Name</label>
            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name">

        </div>
        <div class="form-floating mb-3">
            <label for="floatingInput">Age</label>
            <input type="number" name="age" class="form-control" id="floatingInput" placeholder="age">

        </div>
        {{-- <div class="form-floating mb-3">
            <label for="floatingInput">Email</label>
            <input type="number" name="email" class="form-control" id="floatingInput" placeholder="Email">
        </div> --}}
        <div class="form-floating mb-3">
            <label for="floatingInput">Address</label>
            <input type="text" name="addres" class="form-control" id="floatingInput" placeholder="addres">

        </div>
        <div class="form-floating mb-3">
            <label for="floatingInput">Status</label>
            <input type="text" name="status" class="form-control" id="floatingInput" placeholder="status">
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
        </div>

        <div class="form-floating mb-3">
            <label for="floatingInput">Phone</label>
            <input type="text" name="phone" class="form-control" id="floatingInput" placeholder="Phone">
        </div>

        <div>
            <button type="submit" class="btn btn-success w-100">Add</button>
        </div>
    </form>
@endsection
