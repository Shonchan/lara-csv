@props(['tableHeaders' => [], 'products' => []])

<div class="table-responsive mb-3">
    <table class="table table-striped">
        <thead>
        <tr>
            @foreach($tableHeaders as $header)
                <th scope="col">{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                @foreach($tableHeaders as $alias => $header)
                    @if ($alias === 'id')
                        <th scope="row">{{ $product->id }}</th>
                    @else
                        <td>{{ $alias === 'featured' ? ($product->$alias == 1 ? 1 : '') : $product->$alias }}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
