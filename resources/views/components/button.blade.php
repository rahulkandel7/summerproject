<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2  border border-primary rounded-md font-semibold text-xs text-primary uppercase tracking-widest  focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 hover:bg-primary hover:text-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
