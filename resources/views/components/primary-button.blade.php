<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex cursor-pointer items-center px-4 py-3 bg-primary hover:bg-primary-light border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>