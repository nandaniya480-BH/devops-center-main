<table id="jobs_table" class="table table-responsive">
    <thead>
        <tr>
            <th># ID</th>
            <th>Job title</th>
            <th>Location</th>
            <th>Employment type</th>
            <th>Job Page</th>
            <th>Status</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->item_title }}</td>
            <td>{{ $item->item_location }}</td>
            <td>{{ $item->item_type }}</td>
            <td>
                <a href="/career/jobs/{{ $item->item_slug }}" target="_blank">
                    <i class="fas fa-eye"></i> See page
                </a>
            </td>
            @if($item->item_is_active == 1)
                <td class="text-success">
                    <i class="fas fa-check-circle"></i>
                    Online
                </td>
            @else
                <td class="text-danger">
                    <i class="fas fa-times-circle"></i>
                    Offline
                </td>
            @endif
            
            <td class="td-actions text-right">
                <a href="/jobs/edit/{{ $item->id }}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title=""
                    title="">
                    <i class="fas fa-edit"></i>
                </a>
                <button 
                data-value="{{ $item->id }}"
                data-slug="/jobs"
                data-message="Are you sure want to remove the Job with title:  # {{ $item->item_title }} ?"
                rel="tooltip" 
                class="btn btn-danger btn-icon btn-sm remove-profile" 
                data-toggle="modal" 
                data-target="#removeProfileModal">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#jobs_table').dataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>

@include('blocks.modal.default')
