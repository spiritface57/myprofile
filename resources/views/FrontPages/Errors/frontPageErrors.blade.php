@if ($errors->any())
    <div class="bg-danger text-white my-2 p-4 rounded-3">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if (Session::has('error'))
    <div class="bg-danger text-white my-2 p-4">{{ Session::get('error') }}</div>
@endif
@if (Session::has('success'))
    <div class="bg-success text-white my-2 p-4 rounded-3">{{ Session::get('success') }} </div>
@endif
