@extends('layouts.app')

@section('title', 'Profil')

@section('contents')
<hr />
<form method="POST" enctype="multipart/form-data" action="">
    <div class="card shadow-lg p-4 mb-4">
        <div>
            <label class="label">
                <span class="text-base label-text">Nama</span>
            </label>
            <input name="name" type="text" value="{{ auth()->user()->name }}" class="w-full input input-bordered" />
        </div>
    </div>
    <div class="card shadow-lg p-4 mb-4">
        <div>
            <label class="label">
                <span class="text-base label-text">Email</span>
            </label>
            <input name="email" type="text" value="{{ auth()->user()->email }}" class="w-full input input-bordered" />
        </div>
    </div>
</form>
@endsection