<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    PRUEBA BACK .:: Merqueo ::.
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('images/icono.png')}}" alt="" width="100" class="img-thumbnail">
                        <a href="{{url('api/documentation')}}"> <h3>Documentacion API</h3></a>

                        <div style="float: right;">
                            Gracias por la oportunidad!
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <footer class="bs-docs-footer" style="background: #F6F6F4; text-align:center">
            <div class="container">
                <address>
                    <strong>Miguel Angel Castañeda Vasques</strong><br>
                    <small><strong>Ingeniero de software</strong></small><br>
                    <a href="mailto:miguelCasvas@gmail.com">miguelCasvas@gmail.com</a><br>
                    <abbr title="Phone">P:</abbr> 319 5505453
                </address>
            </div>
        </footer>

    </body>
</html>
