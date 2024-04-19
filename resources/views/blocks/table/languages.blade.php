<table id="languages_table" class="table">
    <thead>
        <tr>
            <th># ID</th>
            <th>Tag name</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($languages as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td class="td-actions text-right">
                <button
                 rel="tooltip" 
                 class="btn btn-success btn-icon btn-sm language-tag" 
                 data-value="{{ $item->id }}"
                 data-name="{{ $item->name }}"
                 data-toggle="modal" 
                 data-target="#editLanguageModal"
                    title="">
                    <i class="fas fa-edit"></i>
                </button>
                <button 
                data-value="{{ $item->id }}"
                data-slug="/language"
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
        $('#languages_table').dataTable({
            "order": [[ 0, "desc" ]]
        });

        var languageArray = {!! $languages !!}
        var languageNames = [];

        languageArray.forEach(function(item) {
            languageNames.push(item.name);
        });

        $('#new_language_name').on('input', function(){
            var value = $('#new_language_name').val();
            if(jQuery.inArray(value, languageNames) != -1){
                $('#create_language_error').html('<strong>"' + value + '" Language already exists! </strong>');
            } else {
                $('#create_language_error').html('');
            }
        });
    });
</script>