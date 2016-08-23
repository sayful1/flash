# Easy Flash Messages for Your Laravel App

## Installation

First, pull in the package through Composer.

Run `composer require sayfulit/flash`

And then, if using Laravel 5, include the service provider within `config/app.php`.

```php
'providers' => [
    Sayfulit\Flash\FlashServiceProvider::class,
];
```

## Usage

Within your controllers, before you perform a redirect...

```php
public function store()
{
    flash()->info('Info', 'Your text goes here.');

    return home();
}
```

You may also do:

- `flash()->success('Title', 'message')`
- `flash()->info('Title', 'message')`
- `flash()->warning('Title', 'message')`
- `flash()->error('Title', 'message')`
- `flash()->overlay('Title', 'message')`

Behind the scenes, this will set a few keys in the session:

- 'flash_message'
- 'flash_message_overlay'

With this message flashed to the session, you may now display it in your view(s). Maybe something like:

```html
@if(session()->has('flash_message'))

<script type="text/javascript">
    swal({
        title: "{{ session('flash_message.title') }}",
        text: "{{ session('flash_message.message') }}",
        type: "{{ session('flash_message.label') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>

@endif

@if(session()->has('flash_message_overlay'))

<script type="text/javascript">
    swal({
        title: "{{ session('flash_message_overlay.title') }}",
        text: "{{ session('flash_message_overlay.message') }}",
        type: "{{ session('flash_message_overlay.label') }}",
        confirmButtonText: "Okay"
    });
</script>

@endif
```

> Note that this package is optimized for use with sweetAlert.

Because flash messages and overlays are so common, if you want, you may use (or modify) the views that are included with this package. Simply append to your layout view:

```html
@include('flash::message')
```

## Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>
<body>

<div class="container">

    <p>Welcome to my website...</p>
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
@include('flash::message')

</body>
</html>
```

If you need to modify the flash message partials, you can run:

```bash
php artisan vendor:publish
```

The package views will now be located in the `resources/views/vendor/sayfulit/flash` directory.
