<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Datos de mi Empresa') }}
        </h2>
    </x-slot>


    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        <form method="POST" action="{{route('miscategoriasupdate', $user)}}">
            {{csrf_field()}} {{ method_field('PUT') }}



            <div class="py-1">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">  
          
                            <div class="px-4 py-4 mb-2 ">
                                <x-jet-label value="Razón Social" />
                                <x-jet-input type="text" 
                                            class="w-full capitalize"
                                            name="razonsocial"
                                            value="{{old('razonsocial', $user->razonsocial)}}"
                                            placeholder="Ingrese la Razón Social de tu Empresa " />
                             <x-jet-input-error for="razonsocial" /> 
                            
                            </div>    


                            <div class="px-4 py-1 mb-2">
                                <label>Categorias de tu empresa</label>
                                <select name="categories[]" class="select2" multiple="multiple" data-placeholder="Selecccione sus categorias" style="width:100%;">
                                    {{-- <option value="" selected disabled>escoge tu categoria</option> --}}
                                    @foreach($categories as $category)
                                    <option {{ collect(old('categories', $user->categories->pluck('id')))->contains($category->id) ? 'selected' : ''}}  value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    
                                </select>
                                <x-jet-input-error for="categories" /> 
                            </div>

                            <div class="px-4 py-4 mb-2 form-group {{ $errors->has('description') ? 'text-danger' : ''}}">
                                <label>Descripción de tu Empresa</label>
                                <textarea rows= "5" name="description" id="editor" class="form-control" placeholder="Ingrese la publicación Completa">{{old('description', $user->description)}}</textarea>
                                {!! $errors->first('body','<span class="help-block">:message</span>') !!}
                                
                                
                            </div>  





                
                
                            <div class="form-group">
                                <button type='submit' class="btn btn-primary btn-block">Guardar </button>
                              </div>
                            </div>





  
        
        
                        </div>
                    </div>
                </div>
        
        
        



        </form>

    </div>
    
    

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" ></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
         $('.select2').select2({
                tags:true
            });
    </script>
    
    <script>
         CKEDITOR.replace('editor');
        CKEDITOR.config.height = 315;
    </script>


    @endpush


    
</x-app-layout>
