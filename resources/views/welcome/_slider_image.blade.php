<section x-data="imageSlider" class="rounded-md  overflow-hidden px-5 z-10">
    <div class="relative h-48 md:h-56 mb-4 w-auto">
        <template x-for="(image, index) in images">
            <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="absolute top-0">
                <div class="p-2 bg-white rounded-xl bg-opacity-30">
                    <img :src="image" alt="image" class="rounded-xl w-full">
                </div>
            </div>
        </template>
    </div>
    <div class="flex justify-between items-center mt-5 px-3 mt-10">
        <button @click="previous()"
            class="translate-y-1/2 bg-gray-50 opacity-30 hover:opacity-100 rounded-full w-5 h-5 flex justify-center items-center shadow-md z-10">
            <svg class="w-3 h-3 font-bold text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                </path>
            </svg>
        </button>
        <div class="rounded-full bg-white text-red-200 text-xs px-2 text-center z-10">
            <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
        </div>
        <button @click="forward()"
            class="translate-y-1/2 bg-gray-50 opacity-30 hover:opacity-100 rounded-full w-5 h-5 flex justify-center items-center shadow-md z-10">
            <svg class="w-3 h-3 font-bold text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</section>
<script>
    document.addEventListener('alpine:init', () => {
                Alpine.data('imageSlider', () => ({
                    currentIndex: 1,
                    images: [
                        '{{ asset("img/banner1.jpg") }}',
                        '{{ asset("img/banner2.jpg") }}',
                        '{{ asset("img/banner3.jpg") }}',
                    ],
                    previous() {
                        if (this.currentIndex > 1) {
                            this.currentIndex = this.currentIndex - 1;
                        }
                    },
                    forward() {
                        if (this.currentIndex < this.images.length) {
                            this.currentIndex = this.currentIndex + 1;
                        }
                    }
                }))
            })
</script>