<footer class="relative bg-bridal-heath-700 text-white overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-bridal-heath-800/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-bridal-heath-800/30 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 container mx-auto px-4 py-16">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-16">
            <!-- Brand Section -->
            <div class="flex flex-col items-start">
                <div class="mb-4">
                    <h3 class="text-3xl font-bold font-titillium text-white">
                        {{ $nama_aplikasi }}
                    </h3>
                    <div class="h-1 w-16 bg-white rounded-full mt-2"></div>
                </div>
                <p class="text-bridal-heath-50 text-base leading-relaxed">{{ $options->where('key', 'selogan')->first()?->value }}</p>
            </div>

            <!-- Social Media Section -->
            <div class="flex flex-col items-start">
                <h3 class="text-lg font-semibold mb-4 text-white">Ikuti Kami</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach ($options->where('type', 'sosial media') as $item)
                        <a href="{{ $item->key === 'whatsapp' ? "https://wa.me/{$item->value}" : $item->value }}"
                            class="group relative w-10 h-10 bg-white hover:bg-bridal-heath-700 rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-md hover:shadow-lg"
                            title="{{ ucfirst($item->key) }}">
                            <i class="fab fa-{{ $item->key }} text-lg text-bridal-heath-600 group-hover:text-white transition-colors duration-300"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Information Center -->
            <div class="flex flex-col items-start">
                <h3 class="text-lg font-semibold mb-4 text-white">Pusat Informasi</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('pages.show', ['page' => 'tentang-kami']) }}" 
                           class="text-bridal-heath-50 hover:text-white hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Tentang Kami</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.show', ['page' => 'kebijakan-privasi']) }}" 
                           class="text-bridal-heath-50 hover:text-white hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Kebijakan Privasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.show', ['page' => 'syarat-ketentuan']) }}" 
                           class="text-bridal-heath-50 hover:text-white hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Syarat & Ketentuan</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Payment Methods -->
            @php $payments = $options->where('key', 'metode pembayaran')->first()?->value; @endphp
            @if ($payments)
                <div class="flex flex-col items-start">
                    <h3 class="text-lg font-semibold mb-4 text-white">Metode Pembayaran</h3>
                    <ul class="space-y-3">
                        @foreach (explode(',', $payments) as $payment)
                            <li class="flex items-center gap-2 text-bridal-heath-50">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $payment }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Order Section -->
            <div class="flex flex-col items-start">
                <h3 class="text-lg font-semibold mb-4 text-white">Pemesanan</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('pages.show', ['page' => 'cara-pemesanan']) }}" 
                           class="text-bridal-heath-50 hover:text-white hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Cara Pemesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.show', ['page' => 'pengiriman']) }}" 
                           class="text-bridal-heath-50 hover:text-white hover:translate-x-1 inline-flex items-center gap-2 transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Pengiriman</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Modern Maps Section -->
        <div class="mb-12">
            <div class="text-center mb-8">
                <div class="inline-flex items-center gap-3 mb-3">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-bridal-heath-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white font-titillium">Kunjungi Toko Kami</h3>
                        <p class="text-bridal-heath-50 text-sm">Temukan lokasi toko fisik kami</p>
                    </div>
                </div>
            </div>
            
            <!-- Map Container with Modern Border -->
            <div class="relative max-w-6xl mx-auto">
                <!-- Decorative corners -->
                <div class="absolute -top-3 -left-3 w-16 h-16 border-t-4 border-l-4 border-white rounded-tl-2xl"></div>
                <div class="absolute -top-3 -right-3 w-16 h-16 border-t-4 border-r-4 border-white rounded-tr-2xl"></div>
                <div class="absolute -bottom-3 -left-3 w-16 h-16 border-b-4 border-l-4 border-white rounded-bl-2xl"></div>
                <div class="absolute -bottom-3 -right-3 w-16 h-16 border-b-4 border-r-4 border-white rounded-br-2xl"></div>
                
                <!-- Map with border -->
                <div class="relative p-1 bg-white rounded-2xl shadow-2xl">
                    <div class="bg-white rounded-2xl overflow-hidden">
                        <iframe
                            class="w-full h-64 md:h-80 lg:h-96"
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3284.854037472328!2d106.64026167402561!3d-6.182094393805386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMTAnNTUuNSJTIDEwNsKwMzgnMzQuMiJF!5e1!3m2!1sid!2sid!4v1736568871329!5m2!1sid!2sid"
                            style="border: 0;"
                            allowfullscreen="true"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                </div>
                
                <!-- Location badge -->
                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 bg-white rounded-full px-6 py-3 shadow-xl flex items-center gap-2 animate-bounce">
                    <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                    <span class="text-gray-800 font-semibold text-sm">Kami di sini!</span>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-bridal-heath-400 pt-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-bridal-heath-50 text-sm text-center md:text-left">
                    © {{ date('Y') }} <span class="font-semibold text-white">{{ $nama_aplikasi }}</span>. All rights reserved.
                </p>
                <p class="text-bridal-heath-50 text-sm text-center md:text-right">
                    Developed by 
                    <a class="font-semibold text-white hover:text-bridal-heath-100 transition-colors duration-300 hover:underline" 
                       href="https://www.fazrilsh.com" 
                       target="_blank">Fazril</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/flowbite/flowbite.min.js') }}"></script>
@vite('resources/js/app.js')
