# Document

## 1. Breadcrumb

### Route
```sh
// Product > [Product Name]
Breadcrumbs::for('product', function ($trail, $product) {
    $trail->parent('product');
    $trail->push($product->title, route('product', $product->id));
});
```

### View

```sh
{{ Breadcrumbs::render('product', $product) }}
```


Learn more at: https://github.com/davejamesmiller/laravel-breadcrumbs

## 2. Helpers

- Get application settings from table settings.
```sh
setting('setting-key-of-table-settings');
```

- Get role information of user login.

```sh
role()->id;
```

- Check if user logged in is supper admin.

```sh
isAdmin();
```

- Check if user logged in has permission to perform a task. Check table permissions for detail.

```sh
hasPermission('permissino-name');
```

- Pass toast message to view.

```sh
toast('success', "Saved successfully.");
```

## 3. Javascripts
###  Quick sidebar

- Button toggle
```sh
<a href="#" data-toggle="quick-sidebar" data-target="#filter-container" class="btn btn-light"><i class="fa fa-filter"></i> Filter</a>
```

- Quick sidebar element
```sh
@section('quick-sidebar')

    <div id="filter-container" class="quick-sidebar">
        <div class="container">
            <div class="header">
                <div class="title">{{ __('Filters') }}</div>
                <a href="#" data-toggle="close-quick-sidebar"><i class="fal fa-times"></i></a>
            </div>
            <div class="body">
                <form class="form">
                    <div class="form-group">
                        <label for="">{{ __('Class room') }}</label>
                        {{ Form::select('class_room_id', [], null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group text-right">
                        <a href="#" data-toggle="close-quick-sidebar" class="btn btn-light">{{ __('Close') }}</a>
                        <button class="btn btn-primary">{{ __('Filter') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
```
