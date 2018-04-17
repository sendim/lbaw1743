@extends('admin.admin-layout')

@section('title', 'Administration Projects')

@section('card-header')
<div class="row">
  <div class="col-5">
    <h5 class="card-title">Projects</h5>
  </div>
  <div class="col-7">
    <form>
      <div class="input-group">
        <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <span class="octicon octicon-search"/>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('card-body')
<div class="nopadding">
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Owner</th>
          <th scope="col">Members</th>
          <th scope="col">Tasks</th>
          <th scope="col">Created at</th>
        </tr>
      </thead>
      <tbody>
        @for($i = 0; $i < count($projects); $i++)
        <tr>
          <td scope="row">
            <div class="text-center">
              <input type="checkbox" value="">
            </div>
          </td>
          <td>{{$projects[$i]->idproject}}</td>
          <td>{{$projects[$i]->name}}</td>
          <td>
            <span class="text-link" href="#">
              @mateus
            </span>
          </td>
          <td>22</td>
          <td>177</td>
          <td>{{$projects[$i]->creationdate}}</td>
        </tr>
        @endfor
    
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('card-footer')
<button type="button" class="btn btn-terciary btn-block more">...</button>
<div class="card-footer">
  <div class="float-right">
    <a class="btn btn-terciary" href="#" role="button">
      <span class="octicon octicon-pencil">
        Edit
      </span></a>
      <a class="btn btn-primary" href="#" role="button">
        <span class="octicon octicon-trashcan">
          Remove
        </span></a>
      </div>
    </div>
    @endsection
    