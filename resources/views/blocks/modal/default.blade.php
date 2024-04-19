<!-- Remove Profile modal -->
<div class="modal fade" id="removeProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Are you sure you want to remove ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="" id="modal_remove_profile" type="button" class="btn btn-danger">Remove</a>
      </div>
    </div>
  </div>
</div>

<!-- Tags Create Modal -->
<div class="modal fade" id="createTagsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-right" role="document">
  {{ Form::open(array('route' => 'tags.store')) }}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="col-md-12">
            <div class="form-group">
                <input id="new_tag_name" type="text" name="name" class="form-control"
                    placeholder="Name">
            </div>
        </div>
        <div class="col-md-12">
          <small id="create_tag_error" class="text-danger text-left"></small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-round" type="submit">Save</button>
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>

<!-- Language Create Modal -->
<div class="modal fade" id="createLanguageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-right" role="document">
  {{ Form::open(array('route' => 'language.store')) }}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new Language</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" id="new_language_name" name="name" class="form-control"
                    placeholder="Name">
            </div>
        </div>
        <div class="col-md-12">
          <small id="create_language_error" class="text-danger text-left"></small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-round" type="submit">Save</button>
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>

<!-- Tag Edit Modal -->
<div class="modal fade" id="editTagsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-right" role="document">
  {{ Form::open(array('route' => 'tags.update')) }}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="tag_id" name="id" class="form-control"
                    placeholder="Name">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" id="tag_name" name="name" class="form-control"
                    placeholder="Name">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-round" type="submit">Save</button>
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>

<!-- Language Edit Modal -->
<div class="modal fade" id="editLanguageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-right" role="document">
  {{ Form::open(array('route' => 'language.update')) }}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Language</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="language_id" name="id" class="form-control"
                    placeholder="Name">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" id="language_name" name="name" class="form-control"
                    placeholder="Name">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-round" type="submit">Save</button>
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>

<script>
    $(document).ready(function(){

        $('.remove-profile').on('click', function(e){
            var dataValue = $(this).data('value');
            var dataSlug = $(this).data('slug');
            var destroyUrl = dataSlug + '/destroy/' + dataValue;
            console.log(destroyUrl);
            $("#modal_remove_profile").attr('href', destroyUrl);
        })

        $('.edit-tag').on('click', function(e){
            var dataValue = $(this).data('value');
            var dataName = $(this).data('name');
            $('#tag_id').val(dataValue);
            $('#tag_name').val(dataName);
        })

        $('.language-tag').on('click', function(e){
            var dataValue = $(this).data('value');
            var dataName = $(this).data('name');
            $('#language_id').val(dataValue);
            $('#language_name').val(dataName);
        });
    });
</script>