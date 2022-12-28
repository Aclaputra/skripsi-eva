@extends('layouts.index')

@section('content')
  <h1>dashboard mahasiswa</h1>
  <div class="container">
      <div class="row">
          <div class="col-12 table-responsive">
              <table class="table table-bordered user_datatable">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th width="100px">Action</th>
                  </tr>
                  </thead>
                  <tbody></tbody>
              </table>
          </div>
      </div>
  </div>
@stop
