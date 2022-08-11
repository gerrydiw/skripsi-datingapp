@extends('layouts.layout')
@section('content')
{{-- <div class="modal fade" id="modal-default-photo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Profile Photo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-default-ktp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload KTP</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route("profile.updateKtp", [$user->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="modal-body">
          <div class="custom-file">
              <input type="file" class="custom-file-input" name="file">
              <label class="custom-file-label">Pilih file</label>
            </div>
            <small class="form-text text-muted">
              Format file .jpg, jpeg, png
          </small>
            {{-- @if($errors->has('filepeserta'))
              <p class="text-danger">
                  <small>{{ $errors->first('filepeserta') }}</small>
              </p>
          @endif --}}
            {{-- <input type=hidden name='kemitraan_id' value={{$kemitraan->id}}/> --}}
      {{-- </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
  </form>
    </div>
    <!-- /.modal-content --> --}}
  {{-- </div> --}}
  <!-- /.modal-dialog -->
{{-- </div> --}}
<div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-warning card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <a href="{{ $user->url_foto ? asset('images/profiles/'.$user->url_foto) : asset('images/default-user-photo.png')}}" data-toggle="lightbox" data-title="Profile Photo">
                <img src="{{ $user->url_foto ? asset('images/profiles/'.$user->url_foto) : asset('images/default-user-photo.png')}}" class="profile-user-img img-fluid img-circle"/>
              </a>
            </div>

            <h3 class="profile-username text-center">{{$user->name}}</h3>

            <p class="text-muted text-center">{{$user->age()}} Years Old</p>
            <p class="text-lg text-center">{{$user->verified ? 'Verified' : 'Unverified'}}</p>

            {{-- <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Followers</b> <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="float-right">13,287</a>
              </li>
            </ul> --}}

            {{-- <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal-default-photo">Change Photo</button> --}}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-warning card-outline">
          <div class="card-body box-profile">
            {{-- <a href="{{ $user->url_ktp ? asset('images/identities/'.$user->url_ktp) : asset('images/identities/no-image-icon-23485.png')}}" data-toggle="lightbox" data-title="KTP">
              <img src="{{ $user->url_ktp ? asset('images/identities/'.$user->url_ktp) : asset('images/identities/no-image-icon-23485.png')}}" class="img-fluid mb-2"/>
            </a>
            <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal-default-ktp">Upload KTP</button>
              <img class=""
                   src="{{ $user->url_ktp ? asset('images/identities/'.$user->url_ktp) : asset('images/identities/no-image-icon-23485.png')}}"
                   alt="User profile picture"> --}}
            <strong><i class="fas fa-book mr-1"></i> About Me</strong>

            <p class="text-muted">
              {{$user->aboutme}}
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

            <p class="text-muted">{{$user->city->name ?? ''}}</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Hobbies</strong>

            <p class="text-muted">
              {{$user->hobbies}}
            </p>

            {{-- <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> --}}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-warning direct-chat direct-chat-warning">
            <div class="card-header">
              <h3 class="card-title">Chat</h3>

              {{-- <div class="card-tools">
                <span title="3 New Messages" class="badge bg-danger">3</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fas fa-comments"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">{{$user->name}}</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="{{$user->url_foto ? asset('images/profiles/'.$user->url_foto) : asset('images/default-user-photo.png')}}" alt="Message User Image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Is this template really for free? That's unbelievable!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">{{auth()->user()->name}}</span>
                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="{{ auth()->user()->url_foto ? asset('images/profiles/'.auth()->user()->url_foto) : asset('images/default-user-photo.png')}}" alt="Message User Image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    You better believe it!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Avatar">

                      <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          Count Dracula
                          <small class="contacts-list-date float-right">2/28/2015</small>
                        </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <form action="#" method="post">
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-warning">Send</button>
                  </span>
                </div>
              </form>
            </div>
            <!-- /.card-footer-->
          </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function () {
      $('#dob').daterangepicker({
          singleDatePicker: true,
          autoApply: true,
          showDropdowns: true,
          locale: {
              "format": "YYYY-MM-DD",
          }
      });
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
      });
    });
  });
</script>
@stop