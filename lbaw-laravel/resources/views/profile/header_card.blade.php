<div id="profile-header-card" class="card">

 @if (empty($profile))
    <h1>Perfil não encontrado></h1>
 @else

 @if(Auth::check() && Auth::user() == $profile)
  <button class="btn btn-primary card-edit-button" data-toggle="modal" data-target="#editprofile-modal">
    <span class="octicon octicon-pencil">
    </span>
  </button>

  {{-- Show login when $editProfile is not empty and true --}}
  @if( ! empty($editProfile) && $editProfile)

  <script type="text/javascript">
  	$(document).ready(function() {
  		$("#editprofile-modal").modal({show: true});
  	});
  </script>

  @endif

  <div class="modal fade bd-example-modal-lg" id="editprofile-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-center bg-primary">
          <h4 class="modal-title w-100 font-weight-bold">Edit Profile</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body mx-3">

          <form method="POST" action="{{ url('profile/'.$profile->iduser.'/edit') }}">
            {{ csrf_field() }}

          <div class="md-form mb-3 required">
            <label for="inputName" class="col-sm-4 col-form-label">Full Name</label>
            	@include('layouts.validation-input', ['name' => 'name', 'value' => $profile->name])
          </div>

          <div class="md-form mb-3 required">
            <label for="inputName" class="col-sm-4 col-form-label">Username</label>
            @include('layouts.validation-input', ['name' => 'username', 'value' => $profile->username])
          </div>

          <div class="md-form mb-3 required">
            <label for="inputName" class="col-sm-4 col-form-label">Email</label>
            	@include('layouts.validation-input', ['name' => 'email', 'type' => 'email', 'value' => $profile->email] )
            <small>
              We'll never share your email with anyone else.
            </small>
          </div>

          <div class="md-form mb-3 required">
            <label for="inputName" class="col-sm-4 col-form-label">Password</label>
            @include('layouts.validation-input', ['name' => 'password', 'type' => 'password'])
          </div>

          <div class="md-form mb-3 required">
            <label for="inputName" class="col-sm-6 col-form-label">Repeat Password</label>
            @include('layouts.validation-input', ['name' => 'password_confirmation', 'type' => 'password'])
          </div>

          <!--  Gender -->

          <div class="md-form mb-3">
            <label for="inputName" class="col-sm-6 col-form-label">Institucion / Company</label>
            @include('layouts.validation-input', ['name' => 'institution', 'value' => $profile->institution])
            <small>
              Fill if you belong to a company or institution.
            </small>
          </div>

          <div class="md-form mb-3 required">
            <label for="inputName" class="col-sm-4 col-form-label">Birthday</label>
            @include('layouts.validation-input', ['name' => 'birthdate', 'type' => 'date', 'value' => \Carbon\Carbon::parse($profile->birthdate)->format('d/m/Y')] )
          </div>

          <div class="md-form mb-3">
            <label for="inputName" class="col-sm-4 col-form-label">Profile Picture</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endif


<div class="card-body">
  <div class="grid">
    <div class="row">
      <div class="col-md-3 text-center">
        <img class="img-round" src="{{ asset('img/profile/'.$profile->iduser.'.png') }}" alt="Profile Picture" width="100">
      </div>
      <div class="col-md-9">
        <h1 class="display-4">{{$profile->username}}</h1>
        <p class="card-text">
          {{$profile->description}}
        </p>
        <div class="company">
          <span class="octicon octicon-location"/>
          <strong>{{$profile->institution}}</strong>
        </div>
      </div>
    </div>
  </div>
</div>

@endif

</div>
