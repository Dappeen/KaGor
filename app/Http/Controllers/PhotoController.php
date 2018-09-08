<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Product;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->disk = 'image_disk';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Извлекаем из БД коллекцию товаров,
        // отсортированных по возрастанию значений атрибута path
        $photos = Photo::orderBy('path', 'ASC')->get();
        // Использовать шаблон resources/views/photos/index.blade.php, где…
        return view('photos.index')->withPhotos($photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Форма добавления продукта в БД.
        // Создаём в ОЗУ новый экземпляр (объект) класса Photo.
        $photo = new Photo();

        // Использовать шаблон resources/views/photos/create.blade.php, в котором…

        $products = product::orderBy('name', 'ASC')->pluck('name', 'id');// выгрузка юзеров через create
        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('photos.create')->withPhoto($photo)->withProducts($products);


  //      return view('photos.create')->withPhoto($photo);
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
        // Принимаем из формы значения полей с name, равными path.
        $attributes = $request->only(['product_id']);
        $file = $request->file('path');
        $attributes['user_id']=$request->user()->id;
        $attributes['path'] = $file->store('', $this->disk);
        // Создаём кортеж в БД.
        $photo = Photo::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['path' => $photo->path])
        );

        // Перенаправляем клиент HTTP на маршрут с именем photos.index
        // (см. routes/web.php).
        return redirect(route('photos.index'));

        /*
        $attributes=$request->only(['publication_id']);
        $file = $request->file('path');
        $path = $file->store('', $this->disk);
        $picture = Picture::create([
          'publication_id' =>$attributes['publication_id'],
          'path'=>$path,
          'hash' => md5_file(realpath($file->getRealPath()))
        ]);
        $request->session()->flash(
          'message',
          __('Created4', ['path' => $picture->path])
        );
        return redirect(route('pictures.index'));
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id');
        // Форма редактирования продукта в БД.
        // Использовать шаблон resources/views/photos/edit.blade.php, в котором…
        return view('photos.edit')->withPhoto($photo)->withProducts($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        // Редактирование продукта в БД.

        // Принимаем из формы значения полей с name, равными path.
        $attributes = $request->only(['path']);

        // Обновляем кортеж в БД.
        $photo->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updated', ['path' => $photo->path])
        );

        // Перенаправляем клиент HTTP на маршрут с именем photos.index
        // (см. routes/web.php).
        return redirect(route('photos.index'));
    }

    /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function remove(Photo $photo)
    {
        // Использовать шаблон resources/views/photos/remove.blade.php, где…
        // …переменная $producs ⁠— это объект товара.
        return view('photos.remove')->withPhoto($photo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Photo $photo)
    {
        // Удаляем товар из БД.
        $photo->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
            'message',
            __('Removed', ['path' => $photo->path])
        );

        // Перенаправляем клиент HTTP на маршрут с именем photos.index
        // (см. routes/web.php).
        return redirect(route('photos.index'));
    }
}
