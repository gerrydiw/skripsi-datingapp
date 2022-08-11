@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-warning card-outline">
                <div class="card-body pb-0">
                  <div class="row">
                    @foreach($users as $user)
                    <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
                      <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                          
                        </div>
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-12 text-center">
                              <a href="{{ $user->avatar ? asset('storage/users-avatar/'.$user->avatar) : asset('storage/users-avatar/avatar.png')}}" data-toggle="lightbox" data-title="Profile Photo">
                                <img src="{{ $user->avatar ? asset('storage/users-avatar/'.$user->avatar) : asset('storage/users-avatar/avatar.png')}}" class="profile-user-img img-fluid img-circle"/>
                              </a>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-12">
                              <h2 class="lead"><b>{{$user->name}}</b></h2>
                              <h5 >{{$user->age() ?? ''}} Years Old</h5>
                              <ul class="ml-0 mb-0 fa-ul text-muted">
                                <li class="medium"> <b>Hobby: </b> {{$user->hobbies}}</li>
                                <li class="medium"> <b>About me: </b> {{$user->aboutme}}</li>
                                <li class="medium"> <b>City: </b> @if(!empty($user->city->id)) {{ $user->city->name}} @endif</li>
                              </ul>
                              {{-- <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:  @if(!empty($user->city->id)) {{ $user->city->name}} @endif</li> --}}
                                {{-- <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li> --}}
                              {{-- </ul> --}}
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="text-right">
                            {{-- <a href="{{route('chat.show', [$user->id])}}" class="btn btn-sm bg-teal">
                              <i class="fas fa-comments"></i>
                            </a> --}}
                            <a href="{{route("profile.view", [$user->id])}}" class="btn btn-sm btn-primary">
                              <i class="fas fa-user"></i> View Profile
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    
                  </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                  <nav aria-label="Contacts Page Navigation">
                  {{ $users->links() }}
                  </nav>
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  $(document).ready(function () {
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
      });
    });
  });
</script>
@parent

@endsection