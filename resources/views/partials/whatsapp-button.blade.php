<div data-tooltip-target="tooltip" data-tooltip-placement="left" class="social-icon fixed bottom-6 right-6 flex items-center justify-center space-x-2 rounded-full shadow-lg z-[999]">
    <a href="https://wa.me/{{ $options->where('key', 'whatsapp')->first()?->value }}" target="_blank" class="bg-green-500 w-16 h-16 rounded-full shadow-xl hover:bg-green-600 flex items-center justify-center">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
    </a>
</div>

<div id="tooltip" role="tooltip" class="absolute invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip z-[999]">
    Hubungi kami melalui whatsapp
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
