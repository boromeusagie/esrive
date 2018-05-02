@extends('layouts.admin')

@section('page_title', 'Theme List')

@section('content')

<button id="addTheme" class="btn btn-info m-b-30"><i class="fa fa-plus"></i> Add Theme</button>

<div class="col-5 m-t-20" id="formTheme" style="display: none;">
  <div class="card card-outline-warning">
    <div class="card-header">
      <h4 class="m-b-0 text-white">Add Theme</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.addtheme') }}" class="form-material" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Theme Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="text" class="form-control" name="author">
        </div>
        <button id="cancelTheme" class="btn btn-danger" type="button">Cancel</button>
        <button class="btn btn-success" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="table-responsive color-table muted-table">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Author</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($themes as $theme)
                <tr>
                  <td>{{ $theme->id }}</td>
                  <td>{{ $theme->name }}</td>
                  <td>{{ $theme->author }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </div>
</div>

@endsection

@section('scripts')

  <script>
    $(function() {
      $('#addTheme').on('click', function() {
        $('#addTheme').css('display', 'none');
        $('#formTheme').slideDown();
      });
      $('#cancelTheme').on('click', function() {
        $('#addTheme').fadeIn();
        $('#formTheme').slideUp();
      });
    });
  </script>

@endsection
