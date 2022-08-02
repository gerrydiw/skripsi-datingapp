@extends('layouts.layout')
@section('content')
<div class="content">
  {{-- <h2 class="text-center">Find People</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                  <form action="{{ route("find.people") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Type here" name="value">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br> --}}
            @can('add_recommendation_place')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-warning" href="{{ route("places.create") }}">
                        Add Recommendation Place
                    </a>
                </div>
            </div>
            @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-warning card-outline">
                <div class="card-body pb-0">
                  <div class="row">
                    @foreach($places as $place)
                    <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                      <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                          
                        </div>
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-5 text-center">
                                <a href="{{ $place->url_foto ? asset('images/places/'.$place->url_foto) : asset('images/default-user-photo.png')}}" data-toggle="lightbox" data-title="Photo">
                                  <img src="{{ $place->url_foto ? asset('images/places/'.$place->url_foto) : asset('images/default-user-photo.png')}}" class="img-fluid"/>
                                </a>
                              </div>
                            <div class="col-7">
                              <h2 class="lead"><b>{{$place->name}}</b></h2>
                              <ul class="ml-0 mb-0 fa-ul text-muted">
                                <li class="medium"> <b>Information & Description: </b> {{$place->desc}}</li>
                                <li class="medium"> <b>City: </b> @if(!empty($place->city->id)) {{ $place->city->name}} @endif</li>
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
                            <a href="{{route("places.show", [$place->id])}}" class="btn btn-sm btn-primary">
                               View Place
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
                  {{ $places->links() }}
                  </nav>
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