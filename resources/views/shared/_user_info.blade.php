<form method="POST" action="{{ route('users.update', $user->id )}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group">
              <label for="username">username：</label>
              <input type="text" name="username" class="form-control" value="{{ $user->username }}" disabled>
            </div>

            <div class="form-group">
              <label for="email">email：</label>
              <input type="text" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
              <label for="password">password：</label>
              <input type="password" name="password" class="form-control" value="{{ old('password') }}">
            </div>

            <div class="form-group">
              <label for="password_confirmation">confirm password：</label>
              <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>


