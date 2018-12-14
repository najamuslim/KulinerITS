@extends('layouts.app')

@section('content')
    <div class="container">
        <script>$(function(){
                $(document).on('click', '.like-review', function(e) {
                    var btn = $(this);
                    $.ajax({
                        type:'POST',
                        url:'{{route('riview.store')}}',
                        data: {
                            _token : '<?php echo csrf_token() ?>',
                            tempat_id: $(this).attr('id'),
                            like:1
                        },
                        success:function(data) {
                            console.log(data);
                            btn.html('<i class="fa fa-heart" aria-hidden="true"></i>  &nbsp;'+data);
                        }
                    });
                });
            });
        </script>
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
                            @php
                                $like = \App\Riview::where([['tempat_id','=',$tempat->id],['like','=',1]])->get()->count();
                            @endphp
                            <td>
                                <button id="{{$tempat->id}}" class="btn-secondary like-review btn-like">
                                    <i class="fa fa-heart" aria-hidden="true"></i> &nbsp;{{ $like }}
                                </button>
                            </td>
                            <td colspan="2">
                                <a href="{{route('tempatmakan.show',$tempat->id)}}" type="button" class="btn btn-primary">Riview</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    </div>
@endsection