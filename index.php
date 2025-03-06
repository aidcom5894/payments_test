<?php 

include('config.php');


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Payment Functionality Test</title>
  </head>
  <body>

  
  		<div class="container mt-4">
		  <div class="row">
		  	<!-- section for form starts here -->
		    <div class="col-sm-8">

		    	<form method="POST">
				  <div class="mb-3">
				    <label class="form-label">Student Name</label>
				    <input type="text" class="form-control" id="newID" name="students_name" value="Vivek Robin Kujur" readonly>				    
				  </div>

				  <div class="mb-3">
				    <label class="form-label">Month</label>
				    <select class="form-select" id="monthName" name="month">
					  <option selected>--- Select Month ---</option>
					  <option value="January">January</option>
					  <option value="February">February</option>
					  <option value="March">March</option>
					  <option value="April">April</option>
					  <option value="May">May</option>
					  <option value="June">June</option>
					  <option value="July">July</option>
					  <option value="August">August</option>
					  <option value="September">September</option>
					  <option value="October">October</option>
					  <option value="November">November</option>
					  <option value="December">December</option>
					</select>				    
				  </div>

				  <div class="mb-3">
				    <label class="form-label">Amount</label>
				    <input type="number" class="form-control" min="1" id="totalFees" name="total_amount">				    
				  </div>

				  <div class="mb-3">
				    <label class="form-label">Transaction ID</label>
				    <input type="text" class="form-control" id="transactionID" name="transaction_id">				    
				  </div>

				  
				
				  <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
				</form>

		    </div>
		    <!-- section for form ends here -->


		    <!-- section for display starts here -->
		    
		    <div class="col-sm-4">
		    	<?php 
		    		$totalCost = 0;
		    		$fetchMonths = mysqli_query($config,"SELECT * FROM site_payments");
			    	while($row = mysqli_fetch_assoc($fetchMonths))
			    	{
			    		$feesSubtotal = $row['total_amount'];
			    		$totalCost += $feesSubtotal;
			    	}
		    		$countData = mysqli_num_rows($fetchMonths);
		    	?>
			<form method="POST">
			<button type="button" class="btn btn-primary">
			  Total Months <span class="badge bg-danger" id="badge"><?php echo $countData; ?></span>
			</button>

			 <div class="mb-3">
			    <label class="form-label"><strong>Total Amount:</strong></label>
			   <input type="number" class="form-control" id="totalCosting" value="<?php echo $totalCost; ?>" readonly>
			  </div>

			  <div class="mb-3">
			    <button type="submit" name="checkout" class="btn btn-success">Checkout</button>
			  </div>

			  
			  </form>
		    </div>
		     <!-- section for display ends here -->


		  </div>
		</div>
  	


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#submit').click(function(e){
			e.preventDefault(); // Prevent the default form submission

			var stdName = $('#newID').val(); // Get the value of the input field
			var monthName = $('#monthName').val();
			var totalAMT = $('#totalFees').val();
			var transactionID = $('#transactionID').val();			

			$.ajax({
				method: 'POST',
				url: 'insert.php',
				data: {
					students_name : stdName,
					month : monthName,
					total_amount : totalAMT,
					transaction_id : transactionID			
				},				
				success:function(response)
				{
					// alert('Monthly Amount Added');
					// // Optionally, you can clear the input fields after successful submission
					$('#newID').val('');
					$('#monthName').val('');
					$('#totalFees').val('');
					$('#transactionID').val('');
				},
				error: function(xhr, status, error)
				{
					alert('Error: ' + error);
				}
			});
		});
	});

	function fetchData() {

	$.ajax({
		method: 'GET',
		url: 'fetchData.php',
		success: function(data) {
			$('#badge').text(data); 
		},
		error: function(xhr, status, error) {
			alert('Error: ' + error);
		}
	});

	$.ajax({
		method: 'GET',
		url: 'fetchCosting.php',
		success: function(data) {
			$('#totalCosting').val(data); 
		},
		error: function(xhr, status, error) {
			alert('Error: ' + error);
		}
	});

	
}

setInterval(fetchData, 200); 
fetchData(); // Initial call


</script>
