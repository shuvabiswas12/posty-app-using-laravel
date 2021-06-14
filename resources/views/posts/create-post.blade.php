
<form class="mb-3" action="{{ route('posts')  }}" method="post">
    @csrf
    <div class="form-group my-2">
                        <textarea class="form-control" name="body" id="body" rows="3" spellcheck="true"
                                  placeholder="Post something!"></textarea>
        @error('body')
        <div class="text-danger mb-2" style="font-weight: bold; font-size: 12px;">
            {{ $message  }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary"
            style="font-size: 18px; border-radius: 8px; font-weight: bold;">Post
    </button>
</form>

