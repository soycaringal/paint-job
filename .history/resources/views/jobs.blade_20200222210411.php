@extends('layouts.app')

@section('content')

<section class="col-5">
    <div class="cars">
        <table class="table table-bordered">
            <thead class="thead thead-dark">
                <tr>
                    <th scope="col">Plate No</th>
                    <th scope="col">Current Color</th>
                    <th scope="col">Target Color</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="car-in-progress">
                
            </tbody>
        </table>
    </div>
</section>

<script>
    $(document).ready(() => {
        poll();
    })


    function template(cars) {
        let template = '
        <tr> \ 
            <td> </td> \
            <td>Otto</td> \
            <td>@mdo</td> \
            <td>@mdo</td> \
        </tr > ';

        cars.
    }
    function getData() {
        $.get('/api/cars')
            .then((res) => {

            });

        poll();
    }
    function poll() {
        setTimeout(() => {
            getData()
        }, 3000);
    }
</script>


@endsection