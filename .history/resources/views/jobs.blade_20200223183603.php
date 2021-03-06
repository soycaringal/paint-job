@extends('layouts.app')

@section('content')
<section>
    <div class="paint-job-title">
        <div class="col-12">
            <h1>Paint Jobs</h1>
        </div>
    </div>
</section>
<article class="row">
    <section class="car-in-progress col-7">
        <h3>Paint Jobs in Progress</h3>
        <table class="table table-bordered">
            <thead class="thead thead-dark">
                <tr>
                    <th scope="col">Plate No</th>
                    <th scope="col">Current Color</th>
                    <th scope="col">Target Color</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="">
                
            </tbody>
        </table>
    </section>
    <section class="col-5">
        <div class="cars">
            <table class="table table-borderless">
                <thead class="thead thead-dark">
                    <tr>
                        <th scope="col" colspan="2">SHOP PERFORMANCE</th>
                    </tr>
                </thead>
                <tbody class="car-performance">
                   
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
</article>

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

        $('.car-queue').html(result);
    }

    function templatePerformance(car) {
        let template = '\
        <tr> \
            <td>Total Cars Painted:</td> \
            <td>{TOTAL_CARS}</td> \
        </tr> \
        <tr> \
            <td colspan="2">Breakdown:</td> \
        </tr> \
        <tr> \
            <td>Blue</td> \
            <td>{TOTAL_BLUE}</td> \
        </tr> \
        <tr> \
            <td>Red</td> \
            <td>{TOTAL_RED}</td> \
        </tr> \
        <tr> \
            <td>Green</td> \
            <td>{TOTAL_GREEN}</td> \
        </tr>';

        let result =  template
            .replace('{TOTAL_CARS}', car.total_cars)
            .replace('{TOTAL_BLUE}', car.total_blue)
            .replace('{TOTAL_RED}', car.total_red)
            .replace('{TOTAL_GREEN}', car.total_green)

        $('.car-performance').html(result);
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