@extends('project.project-layout')

@section('title', 'Manage Users')

@section('card-header')

<div class="row">
  <div class="col-6">
    <h5>Manage users</h5>
  </div>
  <div class="col-6">
    <form>
      <div class="form-group text-right">
        <input type="text" class="form-control" name="search" placeholder="Search">
      </div>
    </form>
  </div>
</div>

@endsection

@section('card-body')

<table class="table">
  <thead>
    <tr>
      <th scope="col-3">
        <p class="text-left font-weight-bold">Username</p>
      </th>
      <th scope="col-3">
        <p class="text-left font-weight-bold">Tasks assigned</p>
      </th>
      <th scope="col-3">
        <p class="text-left font-weight-bold">Name</p>
      </th>
      <th scope="col-3">
        <p class="text-left font-weight-bold">Role</p>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
        <p class"text-left">jotapsa</p>
      </th>
      <td>
        <p class="text-left">5</p>
      </td>
      <td>
        <p class="text-left">João Sá</p>
      </td>
      <td>
        <p class="text-left">Member</p>
      </td>
    </tr>
  </tbody>
</table>

@endsection

@section('card-footer')

<div class="card-footer">
  <ul class="nav nav-pills justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="octicon octicon-pencil"/>
        Edit
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="octicon octicon-trashcan"/>
        Remove
      </a>
    </li>
  </ul>
</div>

@endsection
