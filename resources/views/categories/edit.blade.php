@extends('questions/layout')
 
@section('content')
 
<section id="banner">
    <div class="container">
        <h1>{{ $category->id ? 'Edit category' : 'New category' }}</h1>
    </div>
</section>
 
<section>
    <div class="container">
        <br>
        @include('common/messages')
 
        {{ Form::model($category) }}
 
            <div class="form-group">
                {{ Form::label('name') }}<br>
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
 
            {{ Form::submit("Save", ['class' => "btn btn-primary"]) }}
 
            <a href="{{ route('categories.create') }}" class="btn">New</a>
 
        {{ Form::close() }}
    </div>
</section>
 
@endsection