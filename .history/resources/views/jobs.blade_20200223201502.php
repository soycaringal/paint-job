@extends('layouts.app')

@section('content')
<div class="paint-jobs-content">
    <section>
        <div class="paint-job-title">
            <h1>Paint Jobs</h1>
        </div>
    </section>
    <div class="paint-jobs-wrapper">
        <section class="car-in-progress">
            <h3>Paint Jobs in Progress</h3>
            <table class="table table-bordered">
                <thead class="thead">
                    <tr>
                        <th scope="col">Plate No</th>
                        <th scope="col">Current Color</th>
                        <th scope="col">Target Color</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="car-in-progress-rows">
                    
                </tbody>
            </table>
        </section>
        <section class="car-performance">
            <div class="card">
                <div class="card-header">SHOP PERFORMANCE</div>
                <div class="car-performance-rows card-body"></div>
            </div>
        </section>
    </div>

    <section class="car-queue row-fluid">
        <h3>Paint Queue</h3>
        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                    <th scope="col">Plate No</th>
                    <th scope="col">Current Color</th>
                    <th scope="col">Target Color</th>
                </tr>
            </thead>
            <tbody class="car-queue-rows">
                
            </tbody>
        </table>
    </section>
</div>

<script>
    $(document).ready(() => {
        getData();
        // poll();
    })

    function templatePending(cars) {
        let template = '\
        <tr> \
            <td>{PLATE_NO}</td> \
            <td>{CURRENT_COLOR}</td> \
            <td>{TARGET_COLOR}</td> \
            <td class="text-center">{ACTION}</td> \
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

        $('.car-in-progress-rows').html(result);
    }

    function templateQueue(cars) {
        let template = '\
        <tr> \
            <td>{PLATE_NO}</td> \
            <td>{CURRENT_COLOR}</td> \
            <td>{TARGET_COLOR}</td> \
        </tr>';

        let result = '';
        cars.forEach(car => {
            const action = '<a onclick="updateStatus(' + car.id + ')" href="javascript:void(0)">Mark as Completed</>'
            let row =  template
                .replace('{PLATE_NO}', car.plate_no)
                .replace('{CURRENT_COLOR}', car.current_color)
                .replace('{TARGET_COLOR}', car.target_color)

            result += row;
        });

        $('.car-queue-rows').html(result);
    }

    function templatePerformance(car) {
        let template = '\
            <p> \
                <span>Total Cars Painted:</span> \
                <span class="total">{TOTAL_CARS}</span> \
            </p> \
            <p> \
                <span>Breakdown:</span> \
            </p> \
            <div class="car-colors"> \
                <p> \
                    <span>Blue</span> \
                    <span class="total">{TOTAL_BLUE}</span> \
                </p> \
                <p> \
                    <span>Red</span> \
                    <span class="total">{TOTAL_RED}</span> \
                </p> \
                <p> \
                    <span>Green</span> \
                    <span class="total">{TOTAL_GREEN}</span> \
                </p> \
            </div>';

        let result =  template
            .replace('{TOTAL_CARS}', car.total_cars)
            .replace('{TOTAL_BLUE}', car.total_blue)
            .replace('{TOTAL_RED}', car.total_red)
            .replace('{TOTAL_GREEN}', car.total_green)

        $('.car-performance-rows').html(result);
    }

    function updateStatus(id) {
        $.post('/api/car', {id: id})
        .then((res) => {
            console.log(res);
        });
    }

    async function getData()  {
        await $.get('/api/cars')
        .then((result) => {
            templatePending(result.pending);
            templateQueue(result.queue);
        });

        await $.get('/api/cars/performance')
        .then((result) => {
            templatePerformance(result);
        });
    }

    function poll() {
        setTimeout(() => {
            getData()
            .then(poll())
        }, 3000);
    }
</script>


@endsection