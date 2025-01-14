<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Devices</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <x-modal title="Add API" :status="$api_modal">
                                <div class="form-group">
                                    <label for="">API</label>
                                    <input type="text" wire:model.lazy='api_key' class="form-control">
                                    @error('api_key')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </x-modal>
                            <x-modal title="Qr Code" :status="$qr_modal">
                                {!! QrCode::size(300)->style('round')->generate(route('public.device', $device_id)) !!}
                            </x-modal>
                            <div class=" d-flex justify-content-end">
                                <div class="btn-group">
                                    <button type="button" onclick="updatemap({{$lastLocation->lati ?? 0}},{{$lastLocation->long ?? 0}},'{{$lastLocation->device->name ?? 'No Device History'}}')" class="btn btn-outline-success "
                                        aria-haspopup="true" aria-expanded="false">
                                        Find Device <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </button>
                                    <a class="btn btn-outline-primary "
                                        href="{{ route('location.history', $device_id) }}">
                                        Locations History
                                    </a>
                                    <button wire:click.prevent="$set('api_modal',true)" class="btn btn-outline-info">
                                        add API </button>
                                    <button wire:click.prevent="$set('qr_modal',true)" class="btn btn-outline-info">Qr
                                        Code</button>
                                </div>
                            </div>
                            <div style="width: 100%; height:370px" id="map"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
