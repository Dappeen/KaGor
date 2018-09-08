{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: statuses --}}
@section('name', __('statuses'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('statuses.create'),
                __('Create statuse')
            )
        }}
    </p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('names') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($statuses as $statuse)
                <tr>
                    <td>{{ $statuse->name }}</td>
                    <td>{{ Html::secureLink(
                        route('statuses.edit', $statuse->id),
                        __('Edit statuse')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('statuses.remove', $statuse->id),
                        __('Remove statuse')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
