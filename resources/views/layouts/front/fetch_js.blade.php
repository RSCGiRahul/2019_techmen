<script src="{{ asset('frontend_assets/js/jquery-3.4.1.min.js') }}"></script>
<!-- 
<script src="{{ asset('angular/angular.min.js') }}"></script>
<script src="{{ asset('angular/angular-sanitize.js') }}"></script>
<script src="{{ asset('angular/angular-datatables.min.js') }}"></script>
<script src="{{ asset('angular/front-custom-angular.js') }}"></script> -->
@stack('angular')


<script src="{{asset('frontend_assets/js/materialize.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/plugin/jquery-geolocate.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWQLAVxXN2lAj3gAIZ5Xu45qTchqw95pE"></script>

  <!-- Forms Validations Plugin -->
<script src="{{asset('backend_assets/js/plugins/jquery.validate.min.js') }}"></script>
@stack('custom_js')
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });

    //   location
    $('#input-demo').on('click', function() {
        $('.input-demo').geolocate({
            'components': [
                'locality',
                'administrative_area_level_1',
                'postal_code'
            ],
            'name': 'short_name',
            'delimeter': ' | '
        });
    });

    // dropdown
    $('.dropdown-trigger').dropdown();

    // slider
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });

    //   modal
    $(document).ready(function(){
        $('.modal').modal();
    });

    // Select
    $(document).ready(function(){
        $('select').formSelect();
    });

    // floating icon

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.fixed-action-btn');
        var instances = M.FloatingActionButton.init(elems, {
            direction: 'left',
            hoverEnabled: false
        });
    });
</script>