@props(['value'])

<label {{ $attributes->merge(['class' => 'label']) }}>
   <span class="label-text font-semibold"> {{ $value ?? $slot }}</span>
</label>

