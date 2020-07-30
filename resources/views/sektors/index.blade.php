@extends('includes.head')
@section('title', 'Sektor Index')
@section('content')

<div class="container" style="margin-bottom: 200px">
    <div class="text-center">
        <h3>Semua Sektor <small>({{ $sektors->total() }})</small></h3>
    </div>
    <hr>
    @foreach ($sektors as $sektor)

        <h4><a href="{{ route('sektors.show',$sektor->id) }}" class="fa fa-map-marker" > {{ $sektor->name }}</a></h4>
        <div style="border-bottom: 1px solid #099; margin-bottom: 11px" >
            <p>{{ $sektor->posts->count() }} <i class="fa fa-list-alt"> Post</i></p>
            <p><small class="text-muted"><i class="fa fa-clock-o"></i>{{ $sektor->created_at->diffForHumans()}}</small></p>
        </div>
    @endforeach

    <div>
        {!!$sektors->links();!!}

    </div>

</div>

@endsection
