@extends('layouts.app')

@section('content')
<!-- START: Car Image Content. -->
<section class="car-image-content">
    <div class="paint-job-title">
        <h1>New Paint Job</h1>
    </div>
    <div class="paint-job-images row">
        <div class="col-6">
            <figure>
                <img class="current-color" src="/img/default.png" alt="Current Color">
            </figure>
        </div>
        <figure>
                <img src="/img/arrow.png"">
        </figure>
        <div class="col-6">
            <figure>
                <img class="target-color" src="/img/default.png" alt="Target Color">
            </figure>
        </div>
    </div>
</section>
<!-- START: Car Image Content -->

<section class="car-details col-6">
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
                <select 
                    name="current_color" 
                    class="form-control" 
                    onchange="changeColor('current', this.value)" 
                    required
                >
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
                <select 
                    name="target_color" 
                    class="form-control" 
                    onchange="changeColor('target', this.value)" 
                    required
                >
                    <option value=""></option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                </select>
            </div>
        </div>
        <!-- END: Target Color -->                    
        <button type="submit" class="btn">Submit</button>
    </form>
</section>

<script>
    // Change Image Color by type
    function changeColor(type, color) {
        $('.' + type + '-color').attr('src', '/img/' + color +'.png');
    }
</script>

@endsection