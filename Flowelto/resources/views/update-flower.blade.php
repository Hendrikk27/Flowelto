@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex align-items-center">
            <div class="p-3">
                <img src="{{asset('storage/'.$f->image)}}" alt="" width="200" height="200">
            </div>
            <form class="p-3" action="{{url('update-flower/'.$f->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <th>Category</th>
                        <td>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categoryArr as $c)
                                    <option value="{{$c->id}}" {{$f->category_id==$c->id ? 'selected' : ''}}>{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Flower Name</th>
                        <td>
                            <input type="text" name="name" value="{{$f->name}}" class="form-control">
                            @error('name')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Flower Price (Rupiah)</th>
                        <td>
                            <input type="number" name="price" value="{{$f->price}}" class="form-control">
                            @error('price')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>
                            <textarea name="description" id=""description cols="30" rows="5" class="form-control">{{$f->description}}</textarea>
                            @error('description')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Flower Image</th>
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
