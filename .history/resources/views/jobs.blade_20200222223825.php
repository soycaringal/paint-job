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
                <tbody class="car-queue">
                   
                </tbody>
            </table>
        </div>
    </section>
</div>

<script>
    $(document).ready(() => {
        getData();
        poll();
    })

    function templatePending(cars) {
        let template = '\
        <tr> \
            <td>{PLATE_NO}</td> \
            <td>{CURRENT_COLOR}</td> \
            <td>{TARGET_COLOR}</td> \
            <td>{ACTION}</td> \
        </tr>';

        let result = '';
        cars.forEach(car => {
            const action = '<a onclick="updateStatus(' + car.id + ')" href="javascript:void(0)">Mark as Completed</>'
            let row =  template
                .replace('{PLATE_NO}', car.plate_no)
                .replace('{CURRENT_COLOR}', car.current_color)
                .replace('{TARGET_COLOR}', car.target_color)
                .replace('{ACTION}', action)

            result += row;
        });

        $('.car-in-progress').html(result);
    }

    function updateStatus(id) {
        $.post('/api/car', {id: id})
        .then((res) => {
            console.log(res);
        });
    }

    function getData() {
        $.get('/api/cars/pending')
        .then((res) => {
            templatePending(res);
        });

        $.get('/api/cars/queue')
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