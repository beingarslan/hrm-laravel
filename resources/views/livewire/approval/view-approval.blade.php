<div class="email-app-details show">
    <!-- Actions -->
    @if($approval->approval_status_id == 1)
    <div class="mb-2">
        <button wire:click="validateApproval" class="btn btn-success">Approve</button>
        <button wire:click="validateDecline" class="btn btn-danger">Decline</button>
    </div>
    @if($approval->leave)
    <div>
        <span class="badge bg-primary">Leave Type: {{$approval->leave?->leaveType?->name}}</span>
        <span class="badge bg-primary">Duration: {{$approval->leave?->start_date}} - {{$approval->leave?->end_date}}</span>
    </div>
    @endif
    @else
    <div class="alert alert-primary" role="alert">
        Request already been {{$approval->approval_status_id == 2 ? 'Approved' : 'Declined'}}!
    </div>
    @endif
    <!-- End Actions -->

    <div class="email-scroll-area ps ps--active-y">
        <!-- Approval details -->
        <div class="row">
            @forelse($comments as $comment)
            <div class="col-12">
                <div class="card" style="width: 100%;">
                    <div id="headingCollapse6" class="card-header d-flex justify-content-between align-items-center" data-toggle="collapse" role="tab" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                        <div class="collapse-title media">
                            <div class="pr-1">
                                <div class="avatar bg-primary">
                                    <span>
                                        {{substr($comment->sender->first_name, 0, 1)}}
                                    </span>
                                </div>
                            </div>
                            <div class="media-body  mt-25">
                                <span class="text-primary">{{$comment->sender->first_name}} </span>
                                <span class="d-sm-inline d-none"> &lt;{{$comment->sender->email}}&gt;</span>
                                @if($comment->sender->id == $user->id)
                                <small class="text-muted d-block">to {{ empty($team_member) ? '-' : $team_member->first_name}}</small>
                                @else
                                <small class="text-muted d-block">to {{$user->first_name}}</small>
                                @endif
                            </div>
                        </div>
                        <div class="information d-sm-flex d-none align-items-center">
                            <small class="text-muted mr-50">{{Carbon\Carbon::parse($comment->created_at)->format('d M, Y,  H:i')}}</small>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body py-1 ">
                            @php
                            echo $comment->comment;
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h1>No data found</h1>
            @endforelse
        </div>
    </div>

    @if($approval->approval_status_id == 1)
    <div class="card">
        <div class="card-body">
            <div wire:ignore class="form-group row">
                <div class="col-md-12">
                    <textarea wire:model="message" class="form-control required" name="message" id="message"></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button wire:click="sendComment" id="send-btn" class="btn btn-primary mt-1">Send</button>
            </div>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#message'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('comment', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
    $('#send-btn').click(function() {
        $('#message').val('');
    });
</script>

@endpush