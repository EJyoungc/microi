<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="d-flex justify-content-end ">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="text" wire:model="search" class="form-control" placeholder="search">
                                    </div>
                                </div>
                            </div>
                            <table class="table table-hover table-inverse table-responsive-sm " >
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $item)
                                        <tr>
                                            <td scope="row" class="text-capitalize">{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                <span
                                                    class="badge text-capitalize h5 @if ($item->status == 'active') bg-success @else bg-danger @endif">{{ $item->status }}</span>
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
                                                        <a class="dropdown-item" href="#"
                                                            wire:click.prevent='change_role({{ $item->id }})'>Change
                                                            Role</a>
                                                        <a class="dropdown-item"
                                                            wire:click.prevent='change_status({{ $item->id }})'
                                                            href="#">
                                                            @if ($item->status == 'active')
                                                                Deactivate
                                                            @else
                                                                Activate
                                                            @endif
                                                        </a>
                                                        <a class="dropdown-item" href="#">Remove</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td scope="row" colspan="5" class="text-muted text-center">Empty</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $users->links() }}
                            {{-- modal --}}
                            <div class="modal  @if ($role_modal) show @endif"
                                @if ($role_modal) style="display: block" @endif tabindex="-1"
                                role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button wire:click.prevent='cancel' type="button" class="close"
                                                data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form wire:submit.prevent='store_role'>
                                                <div class="form-group">
                                                    <label for="">Role</label>
                                                    <select wire:model.defer='role' class="form-control">
                                                        <option value="" selected>Select</option>
                                                        <option value="admin">Administrator</option>
                                                        <option value="staff">Staff Member</option>
                                                        <option value="normal">Normal</option>
                                                    </select>
                                                    @error('role')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- modal --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
