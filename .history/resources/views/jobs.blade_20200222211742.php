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
        let template = '\
            <td>{PLATE_NO}</td> \
            <td>Otto</td> \
            <td>@mdo</td> \
            <td>@mdo</td>';

        let result = $('<tr>');
        cars.forEach(car => {
            let row =  template
            .replace('{PLATE_NO}', car.plate_no)
            result.append(row)
        });

        $('.car-in-progress').html(result);
    }
    function getData() {
        $.get('/api/cars')
            .then((res) => {
                template(res);
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