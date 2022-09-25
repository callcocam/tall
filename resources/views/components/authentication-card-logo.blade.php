<div class=" bg-[#141414] rounded-t shadow-md">
    <img
    {{ $attributes->merge([
        'alt' => get_tenant()->name,
        'src' => get_tenant()->cover_photo_url,
        'class' => 'mx-auto shadow-lg',
    ]) }} />

</div>