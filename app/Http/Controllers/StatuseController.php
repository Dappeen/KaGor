<?php

namespace App\Http\Controllers;

use App\Statuse;
use Illuminate\Http\Request;

class StatuseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Извлекаем из БД коллекцию товаров,
        // отсортированных по возрастанию значений атрибута name
        $statuses = Statuse::orderBy('name', 'ASC')->get();
        // Использовать шаблон resources/views/statuses/index.blade.php, где…
        return view('statuses.index')->withStatuses($statuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Форма добавления продукта в БД.
        // Создаём в ОЗУ новый экземпляр (объект) класса Statuse.
        $statuse = new Statuse();

        // Использовать шаблон resources/views/statuses/create.blade.php, в котором…
        return view('statuses.create')->withStatuse($statuse);
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
        // Принимаем из формы значения полей с name, равными name, price.
        $attributes = $request->only(['name']);

        // Создаём кортеж в БД.
        $statuse = Statuse::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['name' => $statuse->name])
        );

        // Перенаправляем клиент HTTP на маршрут с именем statuses.index
        // (см. routes/web.php).
        return redirect(route('statuses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statuse  $statuse
     * @return \Illuminate\Http\Response
     */
    public function show(Statuse $statuse)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statuse  $statuse
     * @return \Illuminate\Http\Response
     */
    public function edit(Statuse $statuse)
    {
        // Форма редактирования продукта в БД.
        // Использовать шаблон resources/views/statuses/edit.blade.php, в котором…
        return view('statuses.edit')->withStatuse($statuse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statuse  $statuse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statuse $statuse)
    {
        // Редактирование продукта в БД.

        // Принимаем из формы значения полей с name, равными name, price.
        $attributes = $request->only(['name']);

        // Обновляем кортеж в БД.
        $statuse->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updated', ['name' => $statuse->name])
        );

        // Перенаправляем клиент HTTP на маршрут с именем statuses.index
        // (см. routes/web.php).
        return redirect(route('statuses.index'));
    }

    /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Statuse  $statuse
     * @return \Illuminate\Http\Response
     */
    public function remove(Statuse $statuse)
    {
        // Использовать шаблон resources/views/statuses/remove.blade.php, где…
        // …переменная $producs ⁠— это объект товара.
        return view('statuses.remove')->withStatuse($statuse);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statuse  $statuse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Statuse $statuse)
    {
        // Удаляем товар из БД.
        $statuse->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
            'message',
            __('Removed', ['name' => $statuse->name])
        );

        // Перенаправляем клиент HTTP на маршрут с именем statuses.index
        // (см. routes/web.php).
        return redirect(route('statuses.index'));
    }
}
