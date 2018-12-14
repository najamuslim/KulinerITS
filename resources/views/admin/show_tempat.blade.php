@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table" id="place_id">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tempat Makan</th>
                <th scope="col">Tipe Makanan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Edit</th>
                <th scope="col" colspan="2">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php $x=1; ?>
            @foreach($tempat_makans as $tempat)
                <tr>
                    <td>{{ $x++ }}</td>
                    <td>{{ $tempat->tempat_name }}</td>
                    <td>{{ $tempat->tipe_makanan }}</td>
                    <td>{{ $tempat->alamat }}</td>
                    @php
                        $like = \App\Riview::where([['tempat_id','=',$tempat->id],['like','=',1]])->get()->count();
                    @endphp
                    <td>
                        <a href="{{route('tempatmakan.edit',$tempat->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td colspan="2">
                        <form style="display: inline-block" method="post" action="{{ route('tempatmakan.destroy', $tempat->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button href="#" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection