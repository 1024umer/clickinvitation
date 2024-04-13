<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="robots" content="noindex, nofollow">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<title>{{$event->name}}</title>

	<style type="text/css">
		<?php include 'assets/pdfstyle.css'; ?>
		@page{ margin: 20px;}
	</style>

</head>

<body class="pdf">
	<div class="pres">
		<div class="centred">
			<h1>{{$event->name}}</h1>
			<br><br>
			<h2>RESUME</h2>
			<p>****************</p>
			<h3>MAIN DATA</h3>
			<p>NUMBER OF TABLES: <strong>{{count($tables)}}</strong></p>
			<p>TOTAL GUESTS: <strong>{{$totguests}}</strong> ({{$totguestseated}} seated - {{$totfrees}} not seated)</p>
			<p>TOTAL GUESTS WITH ALLERGIES: <strong>{{$totallerseated}}</strong> seated</p>
			<p>****************</p>
			<H3>MEALS</H3>
			@foreach($allmeals as $meal)
			<p><strong>{{$meal->ng}}</strong> {{$meal->name}}</p>
			@endforeach

		</div>
		
	</div>
	<div class="page_break"></div>
	@foreach($tables as $table)
	@if(!$loop->first)<div class="page_break"></div>@endif
	<div class="container">
		<table>
			<tbody>
				<tr class="text-center">
					<td class="backt">
						<p>{{$table->number}}</p>
					</td>
					<td colspan="2" style="text-align:center;">
						<h3>{{strtoupper($table->name)}}</h3>
					</td>
				</tr>
				<tr style="font-weight:bold;">
					<td colspan="2">
						<span style="font-size: 18px; "><u>Total Guests: {{$table->guestscount}}</u></span>
						<br>
						GUESTS: {{$table->guestscount}}/{{$table->guest_number}} (
						@if($table->guest_number-$table->guestscount == 0)table full )
						@elseif($table->guest_number-$table->guestscount > 1){{$table->guest_number-$table->guestscount}} free seats )
						@else 1 free seat )
						@endif
						<br>
						@foreach($table->mea as $mea)
						{{$mea->ng}} {{$mea->name}} @if(!$loop->last) - @endif
						@endforeach
					</td>
					<td>{{$table->numallergy}} with allergies</td>
				</tr>
				<tr>
					<td colspan="2" height="40"> </td>
				</tr>
				@foreach($table->guests as $guest)
				<tr>
					<td>{{$guest->name}}</td>
					<td>{{$guest->meal['name']}}</td>
					<td>@if($guest->allergies)<strong>ALLERGY</strong><br>{{$guest->notes}} @else NO ALLERGY @endif</td>					
				</tr>
				<tr>
					<td colspan="3"><hr></td>
				</tr>
				@endforeach
			</tbody>
		</table>		
	</div>	
	@endforeach

</body>

</html>