
<div class="col-md-3 pull-right">
    {{--  tag  --}}
    <ul class="list-group">
        <li class="list-group-item badge text-left" style="background:#e1f723"> Sektor ({{ $sektors->total() }})<small class="pull-right"> <a class="text-dark"
            href="{{ route('sektors.index') }}">lihat semuanya <i class="fa fa-share"></i></a></small></li>
            @foreach ($sektors as $sektor)
                <a href="{{ route('sektors.show',$sektor->id) }}">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="fa fa-map-marker text-dark">
                            {{ $sektor->name }}
                        </i>
                    <span class="badge badge-success badge-pill">{{ $sektor->posts->count() }} Post</span>
                    </li>
                </a>
            @endforeach

        </li>
    </ul>
      {{--  endtag  --}}
      {{--  kategori  --}}
      <ul class="list-group">
        <li class="list-group-item badge text-left" style="background:#e1f723"> Kategori ({{ $categories->total() }})<small class="pull-right">
            <a class="text-dark" href="{{ route('category.index') }}"> lihat semuanya <i class="fa fa-share"></i></a></small></li>
        @foreach ($categories as $category)
            <a href="{{ route('category.show',$category->id) }}">
                <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
                    {{ $category->name }}
                <span class="badge badge-primary badge-pill">{{ $category->posts->count() }} Post</span>
                </li>
            </a>
        @endforeach
      </ul>
      {{--  endkategori  --}}
</div>
