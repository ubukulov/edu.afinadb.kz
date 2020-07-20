@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.users.create') }}
    <div style="margin: 20px 0px;">

    </div>
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
              <div class="col-md-4">
                  <form action="{{ route('users.store') }}" method="post">
                      @csrf
                      <div class="form-group">
                          <label>Имя пользователя</label>
                          <input type="text" name="firstname" class="form-control" required>
                      </div>

                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" required>
                      </div>

                      <div class="form-group">
                          <label>Телефон</label>
                          <input type="text" name="phone" class="form-control">
                      </div>

                      <div class="form-group">
                          <label>Пароль</label>
                          <input type="text" name="password" class="form-control" required>
                      </div>

                      <div class="form-group">
                          <label>Роль в системе</label>
                          <select name="role[]" class="form-control" multiple>
                              <option value="user" selected>Пользователь</option>
                              <option value="admin">Админитратор</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <button type="submit" class="btn btn-default"><i class="fa fa-user-plus"></i>&nbsp; Добавить</button>
                      </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
@stop
