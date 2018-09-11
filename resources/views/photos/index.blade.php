@extends('base')

@section('title', ('Photos'))

<center>
    <h1>{{ ('Photos') }}</h1>
</center>

@section('main')

  <p>
    {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
    {{
      Html::secureLink(
        route('photos.create'),
        __('Create photo')
      )
    }}
  </p>

    <div class="container-fluid">
        <div class="row">
        @foreach ($photos as $photo)
          <figure class = "col-xs-12 col-sm-6 col-md-3 col-lg-1">
            <img alt = "{{ $photo->id }}" src = "{{ asset('storage/images/'.$photo->path) }}" class = "img-responsive img-thumbnail">
            <figcaption class = "text-center">
              {{ Html::secureLink(
                  route('photos.edit', $photo->id),
                  __('Edit photo')
                )}}
              {{ Html::secureLink(
                  route('photos.remove', $photo->id),
                  __('Remove photo')
                )}}
            </figcaption>
          </figure>
        @endforeach
        </div>
    </div>
@endsection
