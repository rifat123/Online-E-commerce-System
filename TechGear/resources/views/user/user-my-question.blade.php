@extends('layouts.user-main')

@section('title')
	<title>My Question</title>
@endsection

@section('main')
	<h5 class="text-center text-info">My Qusetions({{count($questionAnswer)}})</h5>
	</br>
	@if(count($questionAnswer) > 0)
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">My Qusetion</th>
				<th scope="col">Tech Gear Answer</th>
				<th scope="col">Product</th>
			</tr>			  
		</thead>
		<tbody>
			@foreach($questionAnswer as $qn)
	    	<tr style="font-size:13.5px">
	      		<td>
	      			<lable>{{$qn->question}}</lable></br>
	      			<lable class="text-muted">{{$qn->qdate}}&nbsp&nbsp{{$qn->qtime}}</lable>
	      		</td>
	      		<td>
	      			<lable>{{$qn->answer}}</lable></br>
	      			<lable class="text-muted">{{$qn->adate}}&nbsp&nbsp{{$qn->atime}}</lable>
	      		</td>
	      		<td>
	      			<a href="/component/{{$qn->table}}/{{$qn->pid}}" style="text-decoration:none;font-weight:">{{$qn->title}}</a>
	      		</td>
	    	</tr>
	    	@endforeach
		</tbody>
	</table>
	@endif
@endsection

@section('script')

@endsection