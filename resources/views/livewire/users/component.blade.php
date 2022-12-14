<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
          <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="
                        #theModal">Agregar</a>
                    </li>
                </ul>
            </div>
            @include('common.searchbox')

             <div class="widget-content">

                   <div class="table-responsive">
                       <table class="table table-bordered table striped striped mt-1">
                            <thead class="text-write" style="background:#3B3F5C">
                            <tr>
                                <th class="table-th text-white">USUARIO</th>
                                <th class="table-th text-white text-center">TELEFONO</th>
                                <th class="table-th text-white text-center">EMAIL</th>
                                <th class="table-th text-white text-center">ESTATUS</th>
                                <th class="table-th text-white text-center">PERFIL</th>
                                <th class="table-th text-white text-center">IMAGEN</th>
                                <th class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $r)
                                <tr>
                                    <td><h6>{{$r->name}}</h6></td>
                                    <td class="text-center"><h6>{{$r->phone}}</h6></td>
                                    <td class="text-center"><h6>{{$r->email}}</h6></td>
                                    <td class="text-center">
                                        <span class="badge {{ $r->status == 'Active' ? 'badge-success' : 'badge-danger' }}
                                            text-uppercase">{{$r->status}}</span>
                                    </td>
                                    <td class="text-center text-uppercase"><h6>{{$r->profile}}</h6></td>

                                    <td class="text-center">
                                        @if($r->image !=null)
                                        <img src="{{ asset('storage/users/' . $r->image ) }}" alt="imagen"  
                                        class="card-img-top img-fluid">
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="javascript:void(0)"
                                        wire:click="edit({{$r->id}})" 
                                        class="btn btn-dark mtmobile" title="Edit">
                                            {{-- <i class="fas fa-edit"></i> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather 
                                        feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 
                                        2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a>

                                        <a href="javascript:void(0)" 
                                        onclick="Confirm('{{$r->id}}')"
                                        class="btn btn-dark " title="Delete">
                                            {{-- <i class="fas fa-trash"></i> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather 
                                        feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 
                                        1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                       </table>
                       {{$data->links()}}
                   </div>
             </div>
          </div>
    </div>
    @include('livewire.users.form')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('user-added', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('user-apdated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('user-deleted', Msg => {
            noty(Msg)
        })
        window.livewire.on('hide-modal', Msg => {
            $('#theModal').modal('hide')
        })
        window.livewire.on('show-modal', Msg => {
            $('#theModal').modal('show')
        })
        window.livewire.on('user-withsales', Msg => {
            noty(Msg)
        })

    });

    function Confirm(id){
        swal({
            title: 'CONFIRMAR',
            text: '??CONFIRMAS ELIMINAR  EL REGISTRO',
            type: 'WARNING',
            showCancelButton: true,
            cancelButtonText: 'cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3b3f5c',
            confirmButtonText: 'Aceptar'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('deleteRow',id)
                swal.close()
            }
        })
    }
</script>