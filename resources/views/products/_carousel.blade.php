<div id="myCarousel" class="carousel slide" data-ride="carousel">
  @if(count($images)>0)
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @for ($i = 0, $n = count($images); $i < $n; $i++)
        <li data-target="#myCarouse{{$i}}" data-slide-to="{{$i}}" class="active"></li>
      @endfor
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      @for ($i = 0, $n = count($images); $i < $n; $i++)
        @if ($i === 0)
          <div class="item active">
            <img src="{{ $images->get($i)->url }}" style="width: 590px; height: auto; display:block; margin:auto">
          </div>
        @else 
          <div class="item">
            <img src="{{ $images->get($i)->url }}" style="width: 590px; height: auto; display:block; margin:auto">
          </div>
        @endif
      @endfor
    </div>
  @else
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarouse0" data-slide-to="0" class="active"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="/img/not_uploaded.png" style="width: 400px; height: auto; display:block; margin:auto">
      </div>
    </div>
  
  @endif

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>