@extends('layouts.app')
@section('content')
@if (Auth::guest())
	Haha
@else
<table class="table" data-toggle="table"
               data-height="480"
               data-show-columns="true">
	<thead>
		<tr >
			<th data-field="name">Name</th>

			<th data-field="email">Email</th>
			<th data-field="phone">Phone</th>
			<th data-field="phone">Content</th>
		</tr>
	</thead>
	<tbody>		
			<?php  
				foreach ($contacts as $contact) {
			?>
			<tr >
				<td ><?php echo $contact->name;?></td>				
				<td ><?php echo $contact->email;?></td>
				<td ><?php echo $contact->phone;?></td>
				<td ><?php echo $contact->content;?></td>
			</tr>		

			<?php		
				}
			?>
			
		
	</tbody>
</table>
@endif
@endsection
