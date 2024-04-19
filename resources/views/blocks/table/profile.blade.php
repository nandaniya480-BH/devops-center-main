<table id="profile_table" class="table table-responsive">
    <thead>
        <tr>
            <th># ID</th>
            <th>Profile ID</th>
            <th>Name</th>
            <th>Lastname</th>
            <th>Location</th>
            <th>Experience</th>
            <th>Profession Title</th>
            <th>Available from</th>
            <th>Profile Page</th>
            <th>Status</th>
            <th class="text-right">Actions</th>
            <th>Created_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($profile as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->item_profile_number }}</td>
            <td>{{ $item->item_name }}</td>
            <td>{{ $item->item_last_name }}</td>
            <td>{{ $item->item_location }}</td>
            <td>{{ $item->item_experience }}</td>
            <td>{{ $item->item_profile_title }}</td>
            <td>{{ $item->item_available_from_date }}</td>
            <td>
                <a href="/profile/item/{{ $item->item_slug }}" target="_blank">
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
                <a href="/profile/edit/{{ $item->id }}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title=""
                    title="">
                    <i class="fas fa-edit"></i>
                </a>
                <button 
                data-value="{{ $item->id }}" 
                data-slug="/profile" 
                rel="tooltip" 
                class="btn btn-danger btn-icon btn-sm remove-profile" 
                data-toggle="modal" 
                data-target="#removeProfileModal">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#profile_table').dataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>

