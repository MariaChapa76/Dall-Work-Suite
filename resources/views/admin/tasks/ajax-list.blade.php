@forelse($taskFiles as $file)
    <li class="list-group-item" id="task-file-{{  $file->id }}">
        <div class="row">
            <div class="col-md-6">
                {{ $file->filename }}
            </div>
            <div class="col-md-3">
                <span class="">{{ $file->created_at->diffForHumans() }}</span>
            </div>
            <div class="col-md-3">
                <a target="_blank" href="{{ $file->file_url }}"
                   data-toggle="tooltip" data-original-title="View"
                   class="btn btn-info btn-circle"><i
                            class="fa fa-search"></i></a>
                @if(is_null($file->external_link))
                    <a href="{{ route('admin.task-files.download', $file->id) }}"
                       data-toggle="tooltip" data-original-title="Download"
                       class="btn btn-inverse btn-circle"><i
                                class="fa fa-download"></i></a>
                @endif

                <a href="javascript:;" data-toggle="tooltip"  data-original-title="Delete" data-file-id="{{ $file->id }}"
                   data-pk="list" class="btn btn-danger btn-circle file-delete sa-params"><i class="fa fa-times"></i></a>

            </div>
        </div>
    </li>
@empty
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-10">
                @lang('messages.noFileUploaded')
            </div>
        </div>
    </li>
@endforelse
