<div>
    {{-- Success is as dangerous as failure. --}}
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
                            <x-modal title="{{ $title }} Vehicle" :status="$add_car">
                                <form action="" wire:submit.prevent='add_vehicle'>
                                    <div class="form-group">
                                        <label for="">Name of Vehicle</label>
                                        <input type="text" class="form-control" wire:model.defer='car_name'>
                                        @error('name')
                                            <div class="text-dager">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vehicle Model</label>
                                        <input type="text" class="form-control" wire:model.defer='car_model'>
                                        @error('car_model')
                                            <div class="text-dager">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </x-modal>
                            <div class="d-flex justify-content-end">
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
                                        <th>Vehicle Name</th>
                                        <th>Vehicle Model</th>
                                        <th>Year of Make</th>
                                        <th>Organisation</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($cars as $item)
                                        <tr>
                                            <td scope="row">{{ $item->vehicle_make }}</td>
                                            <td>{{ $item->vehicle_model }}</td>
                                            <td>2017</td>
                                            <td>Micromek</td>
                                            <td> <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Options
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('vehicle', $item->id) }}"
                                                        class="dropdown-item">View</a>
                                                    <a href="#" class="dropdown-item"
                                                        wire:click.prevent="open_modal({{ $item->id }})">Edit </a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
