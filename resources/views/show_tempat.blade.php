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
                        <th scope="col">Jumlah Like</th>
                        <th scope="col" colspan="2">Action</th>
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
                            <td>{{ $tempat->jumlah_like }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    </div>
@endsection