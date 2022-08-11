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
              <a href="{{ $user->avatar ? asset('storage/users-avatar/'.$user->avatar) : asset('storage/users-avatar/avatar.png')}}" data-toggle="lightbox" data-title="Profile Photo">
                <img src="{{ $user->avatar ? asset('storage/users-avatar/'.$user->avatar) : asset('storage/users-avatar/avatar.png')}}" class="profile-user-img img-fluid img-circle"/>
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
        {{-- <div class="card card-warning card-outline">
          <div class="card-body box-profile"> --}}
            {{-- <a href="{{ $user->url_ktp ? asset('images/identities/'.$user->url_ktp) : asset('images/identities/no-image-icon-23485.png')}}" data-toggle="lightbox" data-title="KTP">
              <img src="{{ $user->url_ktp ? asset('images/identities/'.$user->url_ktp) : asset('images/identities/no-image-icon-23485.png')}}" class="img-fluid mb-2"/>
            </a>
            <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal-default-ktp">Upload KTP</button> --}}
              {{-- <img class=""
                   src="{{ $user->url_ktp ? asset('images/identities/'.$user->url_ktp) : asset('images/identities/no-image-icon-23485.png')}}"
                   alt="User profile picture"> --}}
            {{-- <strong><i class="fas fa-book mr-1"></i> Education</strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

            <p class="text-muted">
              <span class="tag tag-danger">UI Design</span>
              <span class="tag tag-success">Coding</span>
              <span class="tag tag-info">Javascript</span>
              <span class="tag tag-warning">PHP</span>
              <span class="tag tag-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> --}}
          {{-- </div>
          <!-- /.card-body -->
        </div> --}}
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h5 class="card-title">View Profile</h5>
          </div><!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route("profile.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <label class="col-sm-2">NIK</label>
                <div class="col-sm-10">
                  <p>{{$user->nik ?? '-'}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Full Name</label>
                <div class="col-sm-10">
                    <p>{{$user->name ?? '-'}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">City</label>
                <div class="col-sm-10">
                    <p>{{$user->city->name ?? '-'}}</p>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-2">Date of Birth</label>
                <div class="col-sm-10">
                    <p>{{$user->dob ?? '-'}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Hobbies</label>
                <div class="col-sm-10">
                    <p>{{$user->hobbies ?? '-'}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">About Me</label>
                <div class="col-sm-10">
                    <p>{{$user->aboutme ?? '-'}}</p>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <a href="{{route("find.index")}}" class="btn btn-warning">Back</a>
                </div>
              </div>
            </form>
            {{-- <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                    <span class="username">
                      <a href="#">Sarah Ross</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="input-group input-group-sm mb-0">
                      <input class="form-control form-control-sm" placeholder="Response">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-danger">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                    <span class="username">
                      <a href="#">Adam Jones</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row mb-3">
                    <div class="col-sm-6">
                      <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                          <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-danger">
                      10 Feb. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-primary"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-info"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                      <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-comments bg-warning"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-success">
                      3 Jan. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="https://placehold.it/150x100" alt="...">
                        <img src="https://placehold.it/150x100" alt="...">
                        <img src="https://placehold.it/150x100" alt="...">
                        <img src="https://placehold.it/150x100" alt="...">
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName2" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div> --}}
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
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