<?php

namespace App\Http\Controllers;

use App\Product;
use App\Statuse;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $products = Product::orderBy('name', 'ASC')->get();

        $statuses = Statuse::orderBy('name', 'ASC')->get();

        // Использовать шаблон resources/views/products/index.blade.php, где…
        return view('products.index')->withProducts($products)->withStatuses($statuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Форма добавления продукта в БД.
        // Создаём в ОЗУ новый экземпляр (объект) класса Product.
        $product = new Product();

        $statuses = Statuse::orderBy('name', 'ASC')->pluck('name', 'id');// выгрузка юзеров через create
        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('products.create')->withProduct($product)->withStatuses($statuses);
        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        //return view('products.create')->withProduct($product);
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
        $attributes = $request->only(['name', 'price', 'description', 'statuses_id']);
        $attributes['user_id']=$request->user()->id;

        // Создаём кортеж в БД.
        $product = Product::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['name' => $product->name])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // Форма редактирования продукта в БД.
        // Использовать шаблон resources/views/products/edit.blade.php, в котором…
      //  return view('products.edit')->withProduct($product);
        $statuses = Statuse::orderBy('name', 'ASC')->pluck('name', 'id');// выгрузка юзеров через create
        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('products.edit')->withProduct($product)->withStatuses($statuses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Редактирование продукта в БД.

        // Принимаем из формы значения полей с name, равными name, price.
        $attributes = $request->only(['name', 'price', 'description']);

        // Обновляем кортеж в БД.
        $product->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updated', ['name' => $product->name])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('products.index'));
    }

    /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function remove(Product $product)
    {
        // Использовать шаблон resources/views/products/remove.blade.php, где…
        // …переменная $producs ⁠— это объект товара.
        return view('products.remove')->withProduct($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        // Удаляем товар из БД.
        $product->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
            'message',
            __('Removed', ['name' => $product->name])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('products.index'));
    }
}
