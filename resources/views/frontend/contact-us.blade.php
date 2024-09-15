@extends('frontend.layouts.app')
@section('title', 'Contact Us')
@section('content')
	<section class="mt-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<h2 class="mb-5 text-center">Contact Us</h2>
					<form id="contact-form">
						@csrf
					  <div class="row">
					    <div class="col-md-6">
					      <div class="mb-4">
					        <label for="name" class="form-label">Name</label>
					        <input type="text" class="form-control" name="name" placeholder="Name" required>
					      </div>
					    </div>
					    <div class="col-md-6">
					      <div class="mb-4">
					        <label for="email" class="form-label">email</label>
					        <input type="email" class="form-control" name="email" placeholder="Email" required>
					      </div>
					    </div>
					    <div class="col-md-6">
					      <div class="mb-4">
					        <label for="phone" class="form-label">Phone Number</label>
					        <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required>
					      </div>
					    </div>
					    <div class="col-md-6">
					      <div class="mb-4">
					        <label for="address" class="form-label">Address</label>
					        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
					      </div>
					    </div>
					    <div class="col-md-12">
					      <div class="mb-4">
					        <label for="body" class="form-label">Message</label>
					        <textarea class="form-control" id="body" name="body" rows="5" placeholder="Message" required></textarea>
					      </div>
					    </div>
					  </div>
					  <div class="mb-5">
					    <button class="btn btn-primary" id='submitBtn' type="submit">Send Message</button>
					  </div>
					</form>
					<div id="message" style="display: none;" class="mb-5 alert"></div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		  $('#contact-form').on('submit', function(e) {
		    e.preventDefault();
				$('#submitBtn').text('Sending...');
				$.ajax({
		      url: "{{route('contact-mail')}}",
		      type: 'post',
		      data: $(this).serialize(),
		      success: function(response) {
		                $('#message').removeClass('alert-danger');
		                $('#message').show().addClass('alert-success').text(response.message);
		                $('#submitBtn').text('Send Message');
		                $('#contact-form')[0].reset();
		                setTimeout(function() {
		                  $('#message').hide();
		                }, 3000);
		              },
		      error: function(jqXHR, textStatus, errorThrown) {
		      
		              $('#message').removeClass('alert-success');
		              $('#message').show().addClass('alert-danger').text(jqXHR.responseJSON.message);
		              $('#submitBtn').text('Send Message');
		                setTimeout(function() {
		                  $('#message').hide();
		                }, 3000);
		            }
		    });
		  });
		});
	</script>
@endsection