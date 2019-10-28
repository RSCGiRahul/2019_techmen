@section('footer')
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum eos molestias ducimus, asperiores porro dolores impedit totam similique velit quisquam
                    ab voluptatum soluta commodi cupiditate fugit perspiciatis aspernatur quibusdam sapiente?</p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2019 Copyright Text
            <a class="grey-text text-lighten-4 right" href="http://techtrails.in/">Design and developed by Techtrails</a>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large red">
                    <i class="large material-icons">menu</i>
                </a>
                <ul>
                    <li><a class="btn-floating red"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="btn-floating yellow darken-1"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="btn-floating green"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="btn-floating blue"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

     <div id="modal1" class="modal">
         <form method="POST" action="{{ route('customer.login') }}">
            @csrf
              <div class="modal-content modalHeading">
                <h4 class="center">You're almost there!</h4> 
                <div class="input-field">
                      <input id="name" name = "name" type="text" required class="validate">
                      <label for="name">Enter Your Name</label>
                </div>    
                <div class="input-field">
                      <input id="phone" type="number" required name = "phone" class="validate">
                      <label for="phone">Enter Mobile Number</label>
                      <span class="helper-text" data-error="wrong" data-success="right">Enter a valid number </span>
                </div>       
              </div>
              <div class="modal-footer">
                      <button class="btn waves-effect waves-light btn-small modal-trigger" href="#modal2" type="submit" name="action">Submit
                              <i class="material-icons right">send</i>
                            </button>
                <a href="#" class="modal-close waves-effect waves-green btn-flat">Cancel</a>

                  <a href="{{route('customer.register')}}" class="modal-close waves-effect waves-green btn-flat">Sign Up</a>
              </div>
         </form>
        </div>


    @include('layouts.front.fetch_js')
</footer>
    @endsection