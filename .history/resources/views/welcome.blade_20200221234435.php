<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
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
            
        </div>
    </body>
</html>
