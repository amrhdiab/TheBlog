@extends('admin.layouts.app')
@section('title','Edit Site Settings')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Site Settings
        </div>
        <div class="panel-body">

            <form action="{{route('settings.update')}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="title">Site Name:</label>
                    <input type="text" name="site_name" value="{{$settings['site_name']}}" class="form-control" title="Site Name">
                </div>
                <div class="form-group">
                    <label for="Phone Number">Contact Number:</label>
                    <input type="text" name="contact_number" value="{{$settings['contact_number']}}" class="form-control" title="Contact Number">
                </div>
                <div class="form-group">
                    <label for="email">Contact Email:</label>
                    <input type="email" name="contact_email" value="{{$settings['contact_email']}}" class="form-control" title="Contact Email">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="{{$settings['address']}}" class="form-control" title="Address">
                </div>

                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>

        </div>
    </div>
@endsection