@props(['active' => false,'type'=>'a'])
<a class="{{ $active = 'nav-link'}}"
   aria-current="{{ $active ? 'page': 'false' }}"
    {{ $attributes }}
>{{ $slot }}</a>


