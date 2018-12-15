@extends('layouts.app')

@php
    /** @var \App\TempatMakan $tempat */

@endphp

@section('content')
    <div class="container">
        <script>$(function(){
                $(document).on('click', '.like-review', function(e) {
                    var btn = $(this);
                    $.ajax({
                        type:'POST',
                        url:'{{route('like.store')}}',
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
        <div style="margin-bottom: 20px; align-items: center" class="col-md-4">
            <form action="{{url('/search')}}" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search Place Here">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
        </div>
                <table class="table" id="place_id">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tempat Makan</th>
                        <th scope="col">Tipe Makanan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Like</th>
                        <th scope="col" colspan="2">Review</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x=1;?>
                    @foreach($tempat_makans as $tempat)
                        <tr>
                            <td>{{ $x++ }}</td>
                            <td>{{ $tempat->tempat_name }}</td>
                            <td>
                                @foreach($tempat->tipemakanan()->get() as $tipe)
                                    <?php
                                    echo "<li>$tipe->tipe_makanan</li>";
                                    ?>
                                @endforeach
                            </td>
                            <td>{{ $tempat->alamat }}</td>
                            @php
                                $like = \App\Like::where([['tempat_id','=',$tempat->id],['like','=',1]])->get()->count();
                            @endphp
                            <td>
                                <button id="{{$tempat->id}}" class="btn-secondary like-review btn-like">
                                    <i class="fa fa-heart" aria-hidden="true">&nbsp;{{ $like }}</i> &nbsp;
                                </button>
                            </td>
                            <td colspan="2">
                                @guest
                                    <a href="{{route('login')}}" type="button" class="btn btn-primary">Riview</a>
                                @else
                                    <a href="{{route('tempatmakan.show',$tempat->id)}}" type="button" class="btn btn-primary">Review</a>
                                @endguest
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        {{ $tempat_makans->links() }}
    </div>
@endsection