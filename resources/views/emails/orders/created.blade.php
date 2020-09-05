<div>
  <h1>Новый заказ №{{$order->id}}</h1>
  <h2>Товар:</h2>
  @php($product = $order->product)

  <table>
    <thead>
    <tr>
      <td>Название</td>
      <td>Цена</td>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>
        <a href="{{route('product.show', $product)}}">
          {{$product->title}}
        </a>
      </td>
      <td>
        {{$product->price}}
      </td>
    </tr>
    </tbody>
  </table>
</div>
