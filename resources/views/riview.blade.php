@extends('layouts.app')

@php
    /** @var \App\TempatMakan $tempat */

@endphp

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
                        <td>@foreach($tempatmakan->tipemakanan()->get() as $tipe)
                                <?php
                                echo "<li>$tipe->tipe_makanan</li>";
                                ?>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{$tempatmakan->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Like</td>
                        @php
                            $like = \App\Like::where([['tempat_id','=',$tempatmakan->id],['like','=',1]])->get()->count();
                            $reviewnya = \App\Review::where([['tempat_id','=',$tempatmakan->id],['user_id','=',Auth::user()->id]])->first();
                        @endphp
                        <td>{{$like}}</td>
                    </tr>
                </table>
        <form method="post" action="{{route('review.store')}}">
            <input type="hidden" name="id" value="{{$tempatmakan->id}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Review This Place Here</label>
                <textarea style="height: 100px" class="form-control" name="review" placeholder="Enter Your Review"><?php
                    if($reviewnya)
                        echo $reviewnya->review;
                    else
                        echo "";
                    ?></textarea>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Post">
                <a href="{{route('tempatmakan.index')}}" class="btn btn-danger">Back</a>
            </div>
        </form>
        <div class="col-sm-6">
            @if($errors->any())

                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach

            @endif
        </div>
        <?php
            $reviews = \App\Review::where([['tempat_id','=',$tempatmakan->id]])->get();
        ?>
        @foreach($reviews as $item)
            <?php
                if($item->user_id != Auth::user()->id):
            ?>
        <div class="card bg-light mb-3" style="margin-top: 10px; width: 1110px">
            <div class="card-header" style="width: 1110px"><?php
                $nama = \App\User::where([['id','=',$item->user_id]])->first();
                echo $nama->name;
                ?>
            </div>
            <div class="card-body" style="width: 1110px">
                <p class="card-text"><?php echo $item->review; ?>
                </p>
            </div>
        </div>
            <?php
                endif;
            ?>
        @endforeach
    </div>
@endsection
