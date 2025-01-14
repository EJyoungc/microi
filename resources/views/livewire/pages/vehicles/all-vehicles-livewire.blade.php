<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Vehicles</h1>
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
                            <x-modal title="{{ $title }} Vehicle" :status="$modal">
                                <form action="" wire:submit.prevent='add_vehicle'>
                                    <div class="form-group">
                                        <label for="">Make of Vehicle</label>
                                        <input type="text" class="form-control" wire:model.defer='vehicle_make'>
                                        @error('vehicle_name')
                                            <div class="text-dager">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vehicle Model</label>
                                        <input type="text" class="form-control" wire:model.defer='vehicle_model'>
                                        @error('vehicle_model')
                                            <div class="text-dager">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Year of Make</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="number" class="form-control" data-inputmask-alias="datetime"
                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                inputmode="numeric" wire:model.defer='make_year'>
                                        </div>
                                        @error('make_year')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vehicle Identification Number</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" wire:model.defer='vin'>
                                            <div class="input-group-append">
                                                <span class="input-group-text "><i class="fas fa-check"></i></span>
                                            </div>
                                        </div>
                                        @error('vin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vehicle Mileage</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" wire:model.defer='mileage'>
                                            <div class="input-group-append">
                                                <span class="input-group-text "><i class="fas fa-check"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fuel Type</label>
                                        <select class="form-control" wire:model.defer='fuel_type'>
                                            <option>Select Fuel Type</option>
                                            <option>diesel</option>
                                            <option>petrol</option>
                                            <option value="">Electric</option>

                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <div wire:loading wire:target='add_vehicle'>
                                            <span class="spinner-border spinner-border-sm"></span>
                                        </div>
                                        Save
                                    </button>
                                </form>
                            </x-modal>
                            <div class="d-flex justify-content-end">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search" wire:model='search'>
                                </div>
                                <div class="form-group">
                                    <button wire:click.prevent="open_modal" class="btn btn-info form-control">Add
                                        <div wire:loading wire:target='open_modal'>
                                            <span class="spinner-border spinner-border-sm"></span>
                                        </div>

                                    </button>
                                </div>
                            </div>
                            <table class="table table-striped table-inverse table-responsive-sm">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Vehicle Make</th>
                                        <th>Vehicle Model</th>
                                        <th>Year of Make</th>
                                        <th>Fuel Type</th>
                                        <th>Mileage</th>
                                        <th>Added by</th>
                                        <th>Status</th>
                                        @if (Auth::user()->role == 'systems admin')
                                            <th> Organisation </th>
                                            <th></th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($vehicles as $item)
                                        <tr>
                                            <td>{{ $item->vehicle_make }}</td>
                                            <td>{{ $item->vehicle_model }}</td>
                                            <td>{{ $item->make_year }}</td>
                                            <td>{{ $item->fuel_type }}</td>
                                            <td>{{ $item->mileage }}</td>
                                            @if (Auth::user()->role == 'systems admin')
                                                <td>{{ $item->org->name ?? 'none' }}</td>
                                            @endif

                                            <td>{{ $item->user->name }}</td>
                                            <td>
                                                @if ($item->device_id == null)
                                                    <span class="badge text-danger bg-danger">not assigned</span>
                                                @else
                                                    <span
                                                        class="badge text-capitalize h5 @if ($item->device->status == 'active') bg-success @else  bg-danger @endif">
                                                        {{ $item->device->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-outline-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Options
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('vehicle', $item->id) }}"
                                                            class="dropdown-item">View</a>
                                                        <a href="" class="dropdown-item"
                                                            wire:click.prevent='open_modal({{ $item->id }})'>Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $vehicles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
