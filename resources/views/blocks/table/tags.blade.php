<table id="tags_table" class="table">
    <thead>
        <tr>
            <th># ID</th>
            <th>Tag name</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td class="td-actions text-right">
                <button
                 rel="tooltip" 
                 class="btn btn-success btn-icon btn-sm edit-tag" 
                 data-value="{{ $item->id }}"
                 data-name="{{ $item->name }}"
                 data-toggle="modal" 
                 data-target="#editTagsModal"
                    title="">
                    <i class="fas fa-edit"></i>
                </button>
                <button 
                data-value="{{ $item->id }}"
                data-slug="/tags"
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

@include('blocks.modal.default')

<script>
    $(document).ready(function () {
        $('#tags_table').dataTable({
            "order": [[ 0, "desc" ]]
        });

        var tagsArray = {!! $tags !!}
        var tagsNames = [];

        tagsArray.forEach(function(item) {
            tagsNames.push(item.name);
        });

        $('#new_tag_name').on('input', function(){
            var value = $('#new_tag_name').val();
            if(jQuery.inArray(value, tagsNames) != -1){
                $('#create_tag_error').html('<strong> Tag # "' + value + '" Already exists! </strong>');
            } else {
                $('#create_tag_error').html('');
            }
        });
    });
</script>