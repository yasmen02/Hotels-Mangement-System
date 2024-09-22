@props(['name'])
@error($name)
<div style="color: red; font-weight: bold; font-size: 13px">{{ $message }}</div>
@enderror
