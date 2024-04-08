@extends('layouts.side')
@section('content')

    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center text-dark bg-info">Add New Meal</div>
                    <form action="{{route('meal.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="meal_name">meal name</label>
                                <input type="text" class="form-control" name="meal_name" placeholder="meal name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">meal description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>meal price</label>
                                    <input type="number" name="price" class="form-control" placeholder="meal price">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <h6>choose category <span class="text-danger">*</span></h6>
                                <div class="controls">
                                    <select name="category_id" class="form-control" required="">
                                        <option value="" selected="" disabled="">choose category</option>
                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>meal photo</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="form-group mb-3">
                                <img src="{{asset('Meals/No_Image_Available.jpg')}}" width="120px" height="120px" id="showimage" alt="">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#showimage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
