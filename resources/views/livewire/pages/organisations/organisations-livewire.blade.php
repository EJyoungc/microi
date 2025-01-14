<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Organisations</h1>
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
                            <x-modal title="{{ $title }} Organisation" :status="$add_org">
                                <form action="" wire:submit.prevent='add_organisation'>
                                    <div class="form-group">
                                        <label for="">Organisation Name</label>
                                        <input type="text" class="form-control" wire:model.defer='name'>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" class="form-control" wire:model.defer='description'>
                                    </div>
                                    <button type='submit' class="btn btn-primary">save</button>
                                </form>
                            </x-modal>
                            <div class="d-flex justify-content-end">
                                @if (Auth::user()->role == 'systems admin')
                                    <div class="form-group">
                                        <input type="text" wire:model='search' class="form-control"
                                            placeholder="Search">
                                    </div>
                                    <div class="form-group">
                                        <button wire:click.prevent="open_modal"
                                            class="btn btn-info form-control">Add</button>
                                    </div>
                                @endif

                            </div>
                            <table class="table table-striped table-inverse table-responsive-sm">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($organisations as $item)
                                        <tr>
                                            <td scope="row">{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td> <span
                                                    class="badge text-capitalize h5 @if ($item->status == 'active') bg-success @else bg-danger @endif">{{ $item->status }}</span>
                                            </td>
                                            @if (Auth::user()->role == 'systems admin')
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-outline-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Options
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('organisation', $item->id) }}"
                                                                class="dropdown-item">View</a>
                                                            <a href="#" class="dropdown-item"
                                                                wire:click.prevent='change_status({{ $item->id }})'>
                                                                @if ($item->status == 'active')
                                                                    Deactivate
                                                                @else
                                                                    Activate
                                                                @endif
                                                            </a>
                                                            <a href="" class="dropdown-item"
                                                                wire:click.prevent="open_modal({{ $item->id }})">Edit</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-outline-danger"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"
                                                            wire:click.prevent='org_delete({{ $item->id }})'>
                                                            Remove
                                                        </button>
                                                    </div>
                                                </td>
                                            @endif

                                        </tr>
                                    @empty
                                        <tr>
                                            <td scope="row" class="text-center" colspan="4">Empty</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                        {{ $organisations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
