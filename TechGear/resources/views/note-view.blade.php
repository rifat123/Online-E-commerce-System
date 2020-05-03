@extends('layouts.main')

@section('title')
	<title>Note View</title>
@endsection

@section('middle')
	<div class="container mt-5">		
		<?php echo nl2br($result); ?>
	</div>
@endsection