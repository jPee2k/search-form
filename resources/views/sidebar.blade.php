<aside class="sidebar mt-2">
    {{ Form::open(['url' => route('index'), 'method' => 'GET']) }}
    <div>
        <label class="col-12">
            {{ Form::search('search', null, ['placeholder' => 'search...', 'autocomplate' => 'off', 'class' => 'w-100 rounded']) }}
            {{ Form::submit('Search', ['class' => 'btn btn-primary mt-2 w-100', 'role' => 'button']) }}
        </label>
    </div>
    <div>
        <h4 class="h5 text-center">Sort by</h4>
        {{ Form::select(
            'sort',
            [
                'price_asc' => 'Price, low to high',
                'price_desc' => 'Prise, high to low',
                'name_asc' => 'Name, A - Z',
                'name_desc' => 'Name, Z - A',
                'view_desc' => 'Most popular',
                'rating_desc' => 'Rating',
            ],
            null,
            ['placeholder' => 'Pick a sort method', 'class' => 'col-12'],
        ) }}
    </div>
    <div>
        <h4 class="h5 text-center">Categories</h4>
        @foreach ($categories as $category)
            <label>
                {{ Form::checkbox('categories[]', $category->id) }}
                {{ $category->name }}
            </label><br />
        @endforeach
    </div>
    <div>
        <h4 class="h5 text-center">Brands</h4>
        @foreach ($brands as $brand)
            <label>
                {{ Form::checkbox('brands[]', $brand->id) }}
                {{ $brand->name }}
            </label><br />
        @endforeach
    </div>
    <div>
        <h4 class="h5 text-center">Price between</h4>
        <label>
            {{ Form::number('min', 0, ['class' => 'col-12']) }}
            {{ Form::number('max', 999999, ['class' => 'col-12 mt-2 mb-3']) }}
        </label><br />
    </div>
    
    {{ Form::close() }}
</aside>
