@extends('layouts.app')

@section('content')

    @include('session.success')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Add Food Type</h5>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-body">
                        <form method="post" action="{{route('tipe.store')}}">

                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Type Name</label>
                                <input type="text" class="form-control" name="tipe_makanan" placeholder="Enter Type Name"
                                       value="{{ old('tipe_makanan') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    @if($errors->any())

                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach

                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection