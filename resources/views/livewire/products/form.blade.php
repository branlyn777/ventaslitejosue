@Include('common.modalHead')

<!-- Controles de formulario -->
<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="ej. Curso Laravel">
            @error('name') <span class="text-danger er">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Codigo</label>
            <input type="text" wire:model.lazy="barcode" class="form-control" placeholder="ej. 025975">
            @error('barcode') <span class="text-danger er">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Costo</label>
            <input type="text" data-type='currency' wire:model.lazy="cost" class="form-control" placeholder="ej. 0.00">
            @error('cost') <span class="text-danger er">{{ $message }}</span> @enderror
        </div>
        
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Precio</label>
            <input type="text" data-type='currency' wire:model.lazy="price" class="form-control" placeholder="ej. 0.00">
            @error('price') <span class="text-danger er">{{ $message }}</span> @enderror        
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Stock</label>
            <input type="number" wire:model.lazy="stock" class="form-control" placeholder="ej. 0">
        </div>
        @error('stock') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Alertas</label>
            <input type="number" wire:model.lazy="alerts" class="form-control" placeholder="ej. 10">
        </div>
        @error('alerts') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Categoria</label>
            <select wire:model="categoryid" class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" >{{$category->name}}</option>
                @endforeach
            </select>
            @error('categoryid') <span class="text-danger er"> {{ $message }}</span> @enderror
        </div>
    </div>

    {{-- <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Proveedor</label>
            <select wire:model="providerid" class="form-control" id="select2-dropdown">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($provider as $pro)
                <option value="{{$pro->id}}">{{$pro->name}}</option>
                @endforeach
            </select>
        </div>
        @error('providerid') <span class="text-danger er">{{ $message }}</span> @enderror
    </div> --}}


    <div class="col-sm-12 col-md-8">
        <div class="form-group custom-file">
            <input type="file" class="custom-file-input form-control" wire:model="image"
            accept="image/x-png, image/gif, image/jpeg">
            <label class="custom-file-label">Imagen {{$image}}</label>
            @error('image') <span class="text-danger er"> {{ $message }}</span> @enderror
        </div>
    </div>
</div>
@include('common.modalFooter')

{{-- <script>
    document.addEventListener('DOMContentLoaded', function(){
        //$('#select2-dropdown').select2()

        $('#select2-dropdown').on('change', function (e) {
            var proId = $('#select2-dropdown').select2("val")
            var proName = $('#select2-dropdown option:selected').text()
            @this.set('providerSelectId', proId)
            @this.set('providerSelectName', proName)
        });
    });
</script> --}}