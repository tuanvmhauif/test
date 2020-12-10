@extends("layouts.app")
@section("content")
    <div class="container">
      <form class="survey" method="post" role="form">
        @csrf
        <div class="form-group">
          <label for="name"><b>Name</b></label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" value="{{$test}}"/>
        </div>
        <div class="form-group">
          <label for="email"><b>Email</b></label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email"/>
        </div>
        <div class="form-group">
          <label for="telephone"><b>Telephone</b></label>
          <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Enter Your Telephone"/>
        </div>
        <div class="form-group">
          <label for="feedback"><b>Feedback</b></label>
          <textarea class="form-control" name="feedback" rows="5" id="feedback" placeholder="Enter Your Feedback"></textarea>
        </div>
		<input type="text" name="test" id="test"/>
        <div class="text-center"><button type="button" id="sendFeedback" class="btn btn-success">Send Message</button></div>
      </form>
    </div>
	
    <script type="text/javascript">
      $(document).ready(function () {
        $('#sendFeedback').click(function(){

          var data = {
            "name" : $("#name").val(),
            "_token" : "{{ csrf_token() }}",
            "email" : $("#email").val(),
            "telephone" : $("#telephone").val(),
            "feedback" : $("#feedback").val()
          };
          $.ajax({
            type: "POST",
            url: "api/student-survey",
            data: data,
            success: function(response){
                alert($("#name").val());
				$("#test").val() = $("#name").val();
            },
            error: function(response){
              alert("Gửi phản hồi thất bại");
            }
          });
        });
      });
    </script>
@endsection
