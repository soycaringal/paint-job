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
                @foreach ($cars as $car)
                <tr> 
                    <td>{{ $car->plate_no }}</td> 
                    <td>$car->current_color</td> 
                    <td>$car->taget_color</td> 
                    <td> 
                        @if ($car->status === 'pending')
                            <a href="javascript::void()">Mark as Completed</>
                        @endif
                    </td> 
                </tr>
                @endforeach
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
        <tr> \
            <td>{PLATE_NO}</td> \
            <td>Otto</td> \
            <td>@mdo</td> \
            <td>@mdo</td> \
        </tr>';

        let result = '';
        cars.forEach(car => {
            let row =  template
            .replace('{PLATE_NO}', car.plate_no)
            result += row;
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