<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Извлекаем из БД коллекцию товаров,
        // отсортированных по возрастанию значений атрибута content
        $comments = Comment::orderBy('content', 'ASC')->get();
        // Использовать шаблон resources/views/comments/index.blade.php, где…
        return view('comments.index')->withComments($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Форма добавления продукта в БД.
        // Создаём в ОЗУ новый экземпляр (объект) класса Comment.
        $comment = new Comment();



        $products = product::orderBy('name', 'ASC')->pluck('name', 'id');// выгрузка юзеров через create
        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('comments.create')->withcomment($comment)->withProducts($products);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Добавление продукта в БД
        // Принимаем из формы значения полей с name, равными content, product_id.
        $attributes = $request->only(['content', 'product_id']);
        $attributes['user_id']=$request->user()->id;
//var_dump($attributes);
        // Создаём кортеж в БД.
        $comment = Comment::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['content' => $comment->content])
        );

        // Перенаправляем клиент HTTP на маршрут с именем comments.index
        // (см. routes/web.php).
        return redirect(route('comments.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        // Форма редактирования продукта в БД.
        // Использовать шаблон resources/views/comments/edit.blade.php, в котором…
        $products = product::orderBy('name', 'ASC')->pluck('name', 'id');// выгрузка юзеров через create
        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('comments.edit')->withcomment($comment)->withProducts($products);
        //return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        // Редактирование продукта в БД.

        // Принимаем из формы значения полей с name, равными content, product_id.
        $attributes = $request->only(['content', 'product_id']);

        // Обновляем кортеж в БД.
        $comment->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updateds', ['content' => $comment->content])
        );

        // Перенаправляем клиент HTTP на маршрут с именем comments.index
        // (см. routes/web.php).
        return redirect(route('comments.index'));
    }

    /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function remove(Comment $comment)
    {
        // Использовать шаблон resources/views/comments/remove.blade.php, где…
        // …переменная $producs ⁠— это объект товара.
        return view('comments.remove')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        // Удаляем товар из БД.
        $comment->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
            'message',
            __('Removeds', ['content' => $comment->content])
        );

        // Перенаправляем клиент HTTP на маршрут с именем comments.index
        // (см. routes/web.php).
        return redirect(route('comments.index'));
    }
}
