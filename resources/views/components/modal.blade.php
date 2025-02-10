<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
@props(['title', 'slot' => '','status'=>false])
<div class="modal @if ($status) d-block @endif" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" >{{ $title }}</h5>
                <button type="button" wire:click.prevent='cancel' class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>

        </div>
    </div>
</div>
