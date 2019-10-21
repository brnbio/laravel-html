# laravel-html
HtmlHelper for Laravel 5

## Elements

### link

```blade
{{ html()->link('Google', 'https://google.com') }}
{{ html()->link('Google', 'https://google.com', ['target' => '_blank']) }}
```

### postlink

```blade
{{ html()->link('Delete item', route('item.delete')) }}
{{ html()->link('Delete item', route('item.delete'), ['confirm' => 'Are you sure?']) }}
```
