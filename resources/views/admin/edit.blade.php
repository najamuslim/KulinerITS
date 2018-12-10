@extends('layouts.app')

@section('content')

    @include('session.success')

    <div class="card">
        <h5 class="card-header">Update Place Record</h5>
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <form method="post" action="{{ route('tempatmakan.update' , $tempatMakan->id) }}">

                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Place Name</label>
                            <input type="text" class="form-control" name="tempat_name" placeholder="Enter Place Name"
                                   value="{{ $tempatMakan->tempat_name }}">
                        </div>
                        <div class="form-group">
                            <label>Place Food Type</label>
                            <input type="text" class="form-control" name="tipe_makanan" placeholder="Enter Place Type of Food"
                                   value="{{ $tempatMakan->tipe_makanan }}">
                        </div>
                        <div class="form-group">
                            <label>Place Address</label>
                            <textarea class="form-control" name="alamat" placeholder="Enter Place Address">{{ $tempatMakan->alamat }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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


@endsection