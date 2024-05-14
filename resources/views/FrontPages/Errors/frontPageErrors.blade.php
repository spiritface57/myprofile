@if ($errors->any())
    <div class="bg-danger text-white m-2 p-4">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if (Session::has('error'))
    <div class="bg-danger text-white m-2 p-4">{{ Session::get('error') }}</div>
@endif
@if (Session::has('success'))
    <div class="bg-success text-white m-2 p-4">{{ Session::get('success') }} </div>
@endif
