

<header>
    <div class="jumbotron text-center">
        <h1>Juan's Paint Job</h1>
    </div>   
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">NEW PAINT JOB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/jobs">PAINT JOBS</a>
                </li>
                </li>
            </ul>
        </div>
    </nav>      
</header>

<main>
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

        <h2>Car Details</h2>
        <form action="{{route('car.store')}}" method="post">
            @csrf
            <!-- START: Plate No. -->
            <div class="form-group row">
                <label class="col-4 col-form-label">Plate No.</label>
                <div class="col-8   ">
                    <input type="text" name="plate_no" class="form-control" placeholder="Enter Plate No.">
                </div>
            </div>
            <!-- END: Plate No. -->
            <!-- START: Current Color -->
            <div class="form-group row">
                <label class="col-4 col-form-label">Current Color</label>
                <div class="col-8   ">
                    <select name="current_color"class="form-control">
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
                    <select name="target_color"class="form-control">
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
</main>

<script>
    $(document).ready(() => {
        poll();
    })


    function template(cars) {
        let template = '<tr> \ 
            < td > Mark</td> \
        <td>Otto</td> \
        <td>@mdo</td> \
        <td>@mdo</td> \
                    </tr > ';
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
