@extends('layouts.app')

@php
    /** @var \App\TempatMakan $tempat */

@endphp

@section('content')
    <div class="container">
        <div style="margin-bottom: 10px">
            <a class="btn btn-primary" href="{{route('tipe.create')}}">AddTipe</a>
        </div>
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
                    <td>@foreach($tempat->tipemakanan()->get() as $tipe)
                        <?php
                        echo "<li>$tipe->tipe_makanan</li>";
                        ?>
                    @endforeach
                    </td>
                    <td>{{ $tempat->alamat }}</td>
                    <td>
                        <a href="{{route('tempatmakan.edit',$tempat->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td colspan="2">
                        <form style="display: inline-block" method="post" action="{{ route('tempatmakan.destroy', $tempat->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection