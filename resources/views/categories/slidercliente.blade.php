{{-- slider --}}



<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="relative max-w-7xl max-auto" x-data="{
        activeSlide: 1,
        @php
            $cant = $busine->sliderclientes->count();
            $i=0;
        @endphp


        slides: [

            @forelse($busine->sliderclientes as $slider )
                @php
                    $image = Storage::disk('s3')->url($slider->image)
                @endphp


              { id: {{ $i=$i+1 }}, title: '{{ $slider->title}}', image: '{{ $image }}', body: '{{ $slider->description}}'},
            @empty
                @php
                    $image = '/img/sliderempresas/slide2.jpg'
                @endphp
              { id:1, title: 'Bienvenido a', image: '/sliderempresas/slide1.jpg', body: '{{ $busine->razonsocial}}'},
              {{-- { id:2, title: 'Bienvenido aaaa', image: '/img/sliderempresas/slide2.jpg', body: '{{ $busine->razonsocial}}'}, --}}

              @php
                $cant = 1;

              @endphp

            @endforelse
           {{--  @endforeach --}}

        ],
        loop(){
            setInterval(()=>{this.activeSlide=this.activeSlide==={{ $cant }} ? 1:this.activeSlide + 1},4000)
        }
    }"
    x-init="loop"
    >
        {{-- datalopp --}}

        <template x-for="slide in slides" :key="slide.id">
        @forelse( $busine->sliderclientes as $slider  )
            @php
                 $image = Storage::disk('s3')->url($slider->image)
            @endphp

                <div x-show="activeSlide == slide.id" class="flex items-center p-24 text-white rounded-lg h-80 bg-slate-500" style="background-image: url('{{ $image }}')">
                    <div class="w-full bg-cover" >
                        <div>
                        <h2 class="text-2xl font-bold" x-text="slide.title"></h2>
                        <p class="text-base" x-text="slide.body"></p>
                        </div>
                    </div>
                </div>
        @empty

             let img = slide.id
            <div x-show="activeSlide == slide.id" class="flex items-center p-24 text-white rounded-lg h-80 bg-slate-500" style="background-image: url('{{ $image }}')">
                <div class="w-full bg-cover" >
                    <div>
                    <h2 class="text-2xl font-bold" x-text="slide.title"></h2>
                    <p class="text-base" x-text="slide.body"></p>
                    </div>
                </div>
            </div>

        @endforelse
        </template>

        {{-- back/next --}}
        <div class="absolute inset-0 flex">
            <div class="flex items-center justify-start w-1/2">
                <button
                x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1 "
                class="flex items-center justify-center w-12 h-12 -ml-16 font-bold transition rounded-full shadow bg-slate-200 text-slate-500 hover:bg-blue-500 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                      </svg>
                </button>
            </div>

            <div class="flex items-center justify-end w-1/2">
                <button
                x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1 "
                class="flex items-center justify-center w-12 h-12 -mr-16 font-bold transition rounded-full shadow bg-slate-200 text-slate-500 hover:bg-blue-500 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                      </svg>
                </button>
            </div>

        </div>

        {{-- buttons --}}
        <div class="absolute flex items-center justify-center w-full px-4">
            <template  x-for="slide in slides" :key="slide.id">
                <button class="flex-1 w-4 h-2 mx-2 mt-4 mb-2 overflow-hidden transition-colors duration-200 ease-out rounded-full hover:bg-slate-600 hover:shadow-lg"
                :class="{
                    'bg-blue-600' : activeSlide === slide.id,
                    'bg-slate-300' : activeSlide !== slide.id,
                }"
                x-on:click="activeSlide = slide.id"
                >

                </button>
            </template>
        </div>



    </div>
</div>





{{-- slider --}}
