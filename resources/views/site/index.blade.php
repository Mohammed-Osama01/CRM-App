@extends('site.master')
@section('title', 'Customers | ' . env('APP_NAME'))
@section('content')

    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Age</td>
                <td>Address</td>
                <td>Marital status</td>
                <td>Gender</td>
                <td>Phone</td>
                <td>Created At</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->age }}</td>
                    <td>{{ $customer->addres }}</td>
                    <td>{{ $customer->status }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->phone }}</td>


                        <td><img src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png"
                                style="width:50px; height:50px; border-radius: 50%;margin-top:-10px;margin-left:10px"></td>

                    <td>{{ $customer->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-outline-primary" href="{{ route('customers.edit', $customer->id) }}"><i
                                    class="fas fa-pen"></i></a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
