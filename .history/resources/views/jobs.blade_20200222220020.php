@extends('layouts.app')

@section('content')

<div class="row">
    <section class="col-7">
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
                        <td>{{ $car->current_color }}</td> 
                        <td>{{ $car->target_color }}</td> 
                        <td> 
                            @if ($car->status === 'pending')
                                <a onclick="updateStatus({{ $car->id }})" href="javascript:void(0)">Mark as Completed</>
                            @endif
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
<div class="row">
    <section class="col-5">
        <div class="cars">
            <table class="table table-bordered">
                <thead class="thead thead-dark">
                    <tr>
                        <th scope="col">Plate No</th>
                        <th scope="col">Current Color</th>
                        <th scope="col">Target Color</th>
                    </tr>
                </thead>
                <tbody class="car-in-progress">
                    @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->plate_no }}</td>
                        <td>{{ $car->current_color }}</td>
                        <td>{{ $car->target_color }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

<script>
    $(document).ready(() => {
        // poll();
    })

    function template(cars) {
        let template = '\
        <tr> \
            <td>{PLATE_NO}</td> \
            <td>{CURRENT_COLOR}</td> \
            <td>{TARGET_COLOR}</td> \
            <td></td> \
        </tr>';

        let result = '';
        cars.forEach(car => {
            let row =  template
                .replace('{PLATE_NO}', car.plate_no)
                .replace('{CURRENT_COLOR}', car.current_color)
                .replace('{TARGET_COLOR}', car.target_color)

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