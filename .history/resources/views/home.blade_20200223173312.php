@extends('layouts.app')

@section('content')

<section class="car-image-content">
    <div class="row">
        <div class="col-12">
            <h1 class="new-paint-job-title">New Paint Job</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <figure>
                <img src="/img/default.png" alt="">
            </figure>
        </div>
        <div class="col-4">
            <figure>
                <img src="/img/default.png" alt="">
            </figure>
        </div>

    </div>

</section>
<section class="col-5">
    <h2>Car Details</h2>
    <form action="{{route('car.store')}}" method="post">
        @csrf
        <!-- START: Plate No. -->
        <div class="form-group row">
            <label class="col-4 col-form-label">Plate No.</label>
            <div class="col-8   ">
                <input type="text" name="plate_no" class="form-control" placeholder="Enter Plate No." required>
            </div>
        </div>
        <!-- END: Plate No. -->
        <!-- START: Current Color -->
        <div class="form-group row">
            <label class="col-4 col-form-label">Current Color</label>
            <div class="col-8   ">
                <select name="current_color"class="form-control" required>
                    <option value=""></option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                </select>
            </div>
        </div>
        <!-- END: Current Color -->
        <!-- START: Target Color -->
        <div class="form-group row">
            <label class="col-4 col-form-label">Target Color</label>
            <div class="col-8   ">
                <select name="target_color"class="form-control" required>
                    <option value=""></option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                </select>
            </div>
        </div>
        <!-- END: Target Color -->                    
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
</section>


@endsection