<form action="{{ route('statuses.store') }}" method="POST">
  @include('shared._errors')
  {{ csrf_field() }}
  <textarea class="form-control" rows="3" placeholder="funny things..." name="content">{{ old('content') }}</textarea>
  <button type="submit" class="btn btn-primary pull-right">Submit</button>
</form>