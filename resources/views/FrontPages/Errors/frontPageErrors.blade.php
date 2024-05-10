@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="bg-danger text-white m-2 p-4">{{ $error }}</div>
    @endforeach
@endif
@if (Session::has('success'))
    <div class="bg-success text-white m-2 p-4">{{ Session::get('success') }} </div>
@endif
