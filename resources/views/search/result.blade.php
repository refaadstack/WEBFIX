@extends('includes.head')
@section('title','Hasil Pencarian')
@section('content')

@if (count($posts)>0)
<div class="container" style="margin-bottom: 200px">
    <div class="text-center">
        <h1>Hasil Pencarian</h1>
    </div>
        @foreach ($posts->all() as $post)
       <div class="row">
           <div class="col-md-9">
            <ul class="list-unstyled">
                <div class="col-md-4">
                    <li class="media">
                        <img src="{{ asset('images/'.$post->image) }}" class="img-fluid" alt="Responsive image">
                    </li>
                </div>
                <div class="col-md-8">
                    <div class="media-body">
                        <h3 class="mt-0 mb-1 text-capitalize" ><a href="http://localhost:8000/posts/{{$post->slug}}">{{ $post->title }}</a></h3>
                        <small>{{ date('j F Y',strtotime($post->created_at)) }}</small>
                        @foreach ($post->sektors as $sektor)
                        <span class="badge badge-warning">{{ $sektor->name }}</span>
                        @endforeach
                        <p>{!! Str::limit($post->content)!!} <a href="http://localhost:8000/posts/{{$post->slug}}">Baca Selengkapnya..</a></p>
                       </div>
                </div>
            </ul>
           </div>
       </div>
        @endforeach
    </div>
</div>


@else

 <div class="container" style="margin-bottom: 350px">
     <div class="text-center">
         <h1>Hasil Pencarian</h1>
         <P>TIDAK ADA POSTINGAN DENGAN JUDUL TERSEBUT</P>
     </div>
 </div>
@endif



@endsection()
