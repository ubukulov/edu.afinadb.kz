@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.course.create') }}
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('courses.store') }}" method="post">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Создать курс</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Наименование</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Описание</label>
                                <textarea id="inputDescription" name="full_description" class="form-control" rows="4"></textarea>
                            </div>
                            {{--<div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select class="form-control custom-select">
                                    <option selected="" disabled="">Select one</option>
                                    <option>On Hold</option>
                                    <option>Canceled</option>
                                    <option>Success</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Client Company</label>
                                <input type="text" id="inputClientCompany" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Project Leader</label>
                                <input type="text" id="inputProjectLeader" class="form-control">
                            </div>--}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <input type="submit" value="Создать" class="btn btn-success">
                </form>

            </div>
        </div>
    </section>
@stop
