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
                            <label>Food Type</label>
                            <select style="width: 500px" class="js-example-basic-multiple" name="tipe_makanan[]" multiple="multiple">
                                @foreach($tipe_makanans as $tipe)
                                    <option value="{{$tipe->id}}">{{$tipe->tipe_makanan}}</option>
                                @endforeach
                            </select>
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
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/select2.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection