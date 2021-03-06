@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
          <div class="text-centre">
          <h1 class="pref">Select your preferences for a more personalised result:</h1>
          <br/>
          </div>

      {{ Form::model($preferences, array('url' =>  route("preferences.update", 0), 'method' => 'PUT')) }}

        <div class="row">
          <div class="col-md-4">
          <div class="form-group">
              <h2>{{ Form::label('diet', 'Dietary Mode') }} </h2>
              {{ Form::checkbox('dietary_mode[]', 'Vegan', in_array("Vegan", $dietary_mode) )}} Vegan<br/>
              {{ Form::checkbox('dietary_mode[]', 'Vegetarian', in_array("Vegetarian", $dietary_mode) )}} Vegetarian<br/>
              {{ Form::checkbox('dietary_mode[]', 'Halal', in_array("Halal", $dietary_mode) )}} Halal<br/>
              {{ Form::checkbox('dietary_mode[]', 'Lactose Intolerant', in_array("Lactose Intolerant", $dietary_mode) )}} Lactose Intolerant<br/>
              {{ Form::checkbox('dietary_mode[]', 'Gluten-free', in_array("Gluten-free", $dietary_mode) )}} Gluten-free<br/>
              {{ Form::checkbox('dietary_mode[]', 'Nut Allergy', in_array("Nut Allergy", $dietary_mode) )}} Nut Allergy  <br/>
          </div>
          </div>
          <div class="col-md-4">
          <div class="form-group">
              <h2>{{ Form::label('price', 'Price Range') }} </h2>
              {{ Form::radio('preferred_price_range', '$', ($preferred_price_range == "$" ))}} $<br/>
               {{ Form::radio('preferred_price_range', '$$', ($preferred_price_range == "$$"))}} $$<br/>
               {{ Form::radio('preferred_price_range', '$$$', ($preferred_price_range == "$$$"))}} $$$<br/>
          </div>

          </div>
          <div class="col-md-4">
          <div class="form-group">
            <h2>  {{ Form::label('radius', 'Radius Size') }} </h2>
              {{ Form::radio('preferred_radius_size', 'less than 5km', ($preferred_radius_size == "less than 5km") )}} less than 5km<br/>
              {{ Form::radio('preferred_radius_size', 'less than 10km', ($preferred_radius_size == "less than 10km") )}} less than 10km<br/>
              {{ Form::radio('preferred_radius_size', 'stores that deliver', ($preferred_radius_size == "stores that deliver") )}} stores that deliver<br/>
          </div>

          </div>
        </div>
        {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}
        </div>
    </div>
</div>
@endsection


