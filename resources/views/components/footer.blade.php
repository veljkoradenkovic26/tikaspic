
<footer   >

        <div class="foterinjo">

            <div class="copyright text-center my-auto">
                <span style="color: white;">Copyright © Crvena Zvezda 2018</span>
                <a href="{{ asset('/download') }}" class="btn btn-danger"> dokumentacija</a>
            </div>

        </div>

    @section('appendJavascript')
        @parent
        <script type="text/javascript" src="{{ asset('/js/home.js')}}"></script>
    @endsection
    </footer>



