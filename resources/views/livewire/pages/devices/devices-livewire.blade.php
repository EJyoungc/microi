<div>
    {{-- The Master doesn't talk, he acts. --}}
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
                            <div class="d-flex justify-content-end"><button class="btn btn-info"
                                    wire:click.prevent='add_modal'>Add</button></div>
                            <table class="table table-striped table-inverse table-responsive-sm">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th>Vehicle</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($devices) --}}
                                    @forelse ($devices as $item)
                                        <tr>
                                            {{-- @dd($item) --}}
                                            <td scope="row">{{ $item->name }}</td>
                                            <td>{{ $item->details }}</td>
                                            <td> <span
                                                    class="badge text-capitalize h5 @if ($item->status == 'active') bg-success @else bg-danger @endif">{{ $item->status }}</span>
                                            </td>
                                            <td>{{ $item->assign_vehicle->vehicle->vehicle_make ?? 'unassigned' }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-outline-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Options
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('device', $item->id) }}">View</a>
                                                        <a class="dropdown-item" href="#"
                                                            wire:click.prevent='add_modal({{ $item->id }})'>Edit
                                                        </a>
                                                        <a class="dropdown-item"
                                                            wire:click.prevent='change_status({{ $item->id }})'
                                                            href="#">
                                                            @if ($item->status == 'active')
                                                                Deactivate
                                                            @else
                                                                Activate
                                                            @endif
                                                        </a>
                                                        <a href="" class="dropdown-item"
                                                            wire:click.prevent='vehicle_modal({{ $item->id }})'>
                                                            Assign Vehicle
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td scope="row" class="text-center" colspan="4">Empty</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <!-- Modal -->
                            <x-modal title="{{ $button_status }} device" :status="$modal">
                                <form action="" wire:submit.prevent='add_device'>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Device Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter name" wire:model.defer='name'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Device Details</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter description..." wire:model.defer='details'></textarea>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </form>
                            </x-modal>
                            {{-- modal --}}
                            <x-modal title="Assign to Vehicle" :status="$assign_d">
                                <form action="" wire:submit.prevent='asign_vehicle'>
                                    <div class="form-group" data-select2-id="29">
                                        <label>Select Vehicle</label>
                                        <select class="form-control " wire:model.defer='vehicle_make'>
                                            <option value="">select</option>
                                            @forelse ($vehicles as $item)
                                                <option>{{ $item->vehicle_make }}</option>
                                            @empty
                                                <option data-select2-id="35">No Vehicles</option>
                                            @endforelse

                                        </select>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Assign</button>
                                </form>

                            </x-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
