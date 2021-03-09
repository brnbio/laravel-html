# laravel-html
Html Helper for Laravel

## Elements

### image

```php
{{ html()->image('img/logo.png') }}
// <img src="/img/logo.png" />

{{ html()->image('img/logo.png', ['height' => 50]) }}
// <img src="/img/logo.png" height="50" />

{{ html()->image('img/logo.png', ['inline' => true]) }}
// <img src="data:image/png;base64,iVBOR...AAAA" />
```

### link

```php
{{ html()->link(route('home')) }}
// <a href="http://example.localhost">http://example.localhost</a>

{{ html()->link(route('home'), 'Home') }}
// <a href="http://example.localhost">Home</a>

{{ html()->link(route('home'), 'Home', ['target' => '_blank']) }}
// <a href="http://example.localhost" target="_blank">Home</a> 

```

### postlink

```php
{{ html()->postlink(route('delete'), 'Delete item') }}
// <a href="/delete" onclick="event.preventDefault();document.getElementById("html-postlink-c119ebf7-1dbb-4766-a7fd-be4d26de7f8b").submit();">Home</a>
// <form action="/delete" id="html-postlink-c119ebf7-1dbb-4766-a7fd-be4d26de7f8b" style="display: none;" method="post" accept-charset="utf-8"><input type="hidden" name="_token" value="pum4...8p3"></form>

{{ html()->link(route('delete'), 'Delete item', ['confirm' => 'Sure?']) }}
// <a href="..." onclick="...if(confirm('Sure?')){...submit();}else{return false;}">Home</a>
```
