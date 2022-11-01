<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>Corte de Caja</b>
                </h4>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label>Usuario</label>
                            <select wire:model="userid" class="form-control">
                                <option value="0" disabled>Elegir</option>
                                @foreach ($users as $u)
                                <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                            @error('userid') <span class="text-danger er">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label>Fecha Inicial</label>
                            <input type="date" wire:model.lazy="fromDate" class="form-control">
                            @error('fromDate') <span class="text-danger er">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label>Fecha Final</label>
                            <input type="date" wire:model.lazy="toDate" class="form-control">
                            @error('toDate') <span class="text-danger er">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3 align-self-center d-flex justity-content-around">
                        <div class="form-group">
                            @if($userid > 0 && $fromDate != null && $toDate != null)
                            <button wire:click.prevent="Consultar" type="button"
                            class="btn btn-dark">Consultar</button>
                            @endif
                            <!--Revisar">-->
                            @if($total > 0)
                            <a class="btn btn-dark {{count($sales) < 1 ? 'disabled' : '' }}"
                                href="{{ url('cashout/pdf' . '/' . $userid . '/' . $fromDate . '/' . $toDate) }}" 
                                target="_blank">Generar PDF</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12 col-md-4 mbmobile">
                    <div class="connect-sorting bg-dark">
                        <h5 class="text-white">Ventas Totales: ${{number_format($total,2)}}</h5>
                        <h5 class="text-white">Articulos: {{$items}}</h5>
                    </div>
                </div>


                <div class="col-sm-12 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-1">
                            <thead class="text-white" style="background: #3b3f5c">
                                <tr>
                                    <th class="table-th text-center text-white">FOLIO</th>
                                    <th class="table-th text-center text-white">TOTAL</th>
                                    <th class="table-th text-center text-white">ITEMS</th>
                                    <th class="table-th text-center text-white">FECHA</th>
                                    <th class="table-th text-center text-white"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($total <= 0)
                                <tr><td colspan="4"><h6 class="text-center">No hay ventas en la fecha selccionada</h6></td></tr>
                                @endif

                                @foreach($sales as $row)
                                <tr>
                                    <td class="text-center">{{$row->id}}</td>
                                    <td class="text-center">${{number_format($row->total,2)}}</td>
                                    <td class="text-center">{{$row->items}}</td>
                                    <td class="text-center">{{$row->created_at}}</td>
                                    <td class="text-center">
                                        <button wire:click.prevent="viewDetails({{$row}})" class="btn btn-dark btn-sm">
                                            {{-- <i class="fas fa-list"></i> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 
                                            24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                                            stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21"
                                             y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" 
                                             x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3"
                                              y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.cashout.modalDetails')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('show-modal', msg=>{
            $('#modal-details').modal('show')
        });
    })
</script>