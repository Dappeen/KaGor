{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции content родительского шаблона будет выведен перевод фразы: comments --}}
@section('content', __('comments'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('comments.create'),
                __('Create comment')
            )
        }}
    </p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('content') }}</th>
                <th>{{ __('product_id') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->product_id }}</td>
                    <td>{{ Html::secureLink(
                        route('comments.edit', $comment->id),
                        __('Edit comment')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('comments.remove', $comment->id),
                        __('Remove comment')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
