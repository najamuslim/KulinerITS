@extends('layouts.app')

@section('content')

    @include('session.success')

    <div class="container">
                <table class='table table-hover table-responsive table-bordered'>
                    <tr>
                        <td width="500px">Tempat Makan</td>
                        <td width="2000px">{{$tempatmakan->tempat_name}}</td>
                    </tr>
                    <tr>
                        <td>Tipe Makanan</td>
                        <td>{{$tempatmakan->tipe_makanan}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{$tempatmakan->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Like</td>
                        @php
                            $like = \App\Riview::where([['tempat_id','=',$tempatmakan->id],['like','=',1]])->get()->count();
                        @endphp
                        <td>{{ $like }}</td>
                    </tr>
                    <tr>
                        <td>Riview</td>
                        <td><textarea class="form-control" name="alamat" placeholder="Enter Your Riview"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="{{route('tempatmakan.index')}}" class='btn btn-danger'>Back</a>
                        </td>
                    </tr>
                </table>
    </div>
@endsection
