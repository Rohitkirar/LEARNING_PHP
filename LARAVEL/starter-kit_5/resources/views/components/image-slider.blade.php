<!-- Bootstrap crossfade carousel -->
          <div class="col-md">
            <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                @for($i = 0; $i < count($images) ; $i++)  
                  <div class="carousel-item @if($i==0) active @endif">
                    <img class="d-block w-100" src="{{$images[$i]->path}}" alt="First slide" />
                    <div class="carousel-caption d-none d-md-block">
                      {{-- <h4>First slide</h4>
                      <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p> --}}
                    </div>
                    @if(isset($edit) && $edit )
                        <button class="btn btn-danger mt-2 mb-5 w-100" onclick="imageDelete($image)">Delete</button>
                    @endif
                  </div>
                @endfor
                
              </div>
              <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>