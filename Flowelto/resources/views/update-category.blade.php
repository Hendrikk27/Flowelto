@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex align-items-center">
            <div class="p-3">
                <img src="{{asset('storage/'.$c->image)}}" alt="" width="200" height="200">
            </div>
            <form class="p-3" action="{{url('update-category/'.$c->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <th>Category Name</th>
                        <td>
                            <input type="text" name="name" placeholder="{{$c->name}}" class="form-control">
                            @error('name')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Category Image</th>
                        <td>
                            <input type="file" name="image">
                            @error('image')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
