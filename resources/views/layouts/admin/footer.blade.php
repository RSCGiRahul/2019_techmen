@section('footer')

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <h4 class="modal-title" id = "model_title">Modal Header</h4>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body" id = "modalData">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
        <div class="container-fluid">
           <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, Developed <i class="material-icons">favorite</i> by
            <a href="https://techtrails.in/" target="_blank">Techtrails</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  @endsection