@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="text-center">
                <h4>Add New Flower</h4>
            </div>
            <form class="p-3" action="{{url('add-flower/')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <th>Category</th>
                        <td>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Choose One</option>
                                @foreach ($categoryArr as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
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
                            <input type="text" name="name" class="form-control">
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
                            <input type="number" name="price" class="form-control">
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
                            <textarea name="description" id=""description cols="30" rows="5" class="form-control"></textarea>
                            @error('description')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Flower Image</th>
                        <td class="d-flex flex-column">
                            <input type="file" name="image">
                            @error('image')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center p-3">
                            <input type="submit" value="Add" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
