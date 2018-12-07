@extends('layouts.app')

@section('content')

    @include('session.success')
    <div class="container">
    <div class="card">
        <h5 class="card-header">Add Food Place</h5>
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <form method="post" action="{{route('tempatmakan.store')}}">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Place Name</label>
                            <input type="text" class="form-control" name="tempat_name" placeholder="Enter Place Name"
                                   value="{{ old('tempat_name') }}">
                        </div>
                        <div class="form-group">
                            <label>Place Food Type</label>
                            <input type="text" class="form-control" name="tipe_makanan" placeholder="Enter Place Type of Food"
                                   value="{{ old('tipe_makanan') }}">
                        </div>
                        <div class="form-group">
                            <label>Place Address</label>
                            <textarea class="form-control" name="alamat" placeholder="Enter Place Address">{{ old('alamat') }}</textarea>
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