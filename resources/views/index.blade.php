@extends('layouts.master')

@section('content')
<!-- Marquee notice -->
<div class="marquee-container">
  <div class="marquee">
    This is the only official website authorized by South Asia University Bangladesh for online certificate verification.
  </div>
</div>

<!-- Certificate Verification Box -->
<div style="max-width: 600px; margin: 40px auto; font-family: Arial, sans-serif; border: 1px solid #ddd; border-radius: 4px;">

  <!-- Header -->
  <div style="background-color: #f1f3f5; padding: 12px 20px; border-bottom: 1px solid #ccc; font-weight: bold; font-size: 16px; display: flex; align-items: center; gap: 8px;">
    <span style="color: green;">✔</span> Certificate Verification
  </div>

  <!-- Error message -->
  @if($errors->has('verify'))
    <div style="padding: 10px; background-color: #f8d7da; color: #721c24; margin: 15px 20px 0; border-radius: 4px;">
      {{ $errors->first('verify') }}
    </div>
  @endif
  
  <!-- Form Content -->
  <form method="post" action="{{ url('verify') }}" style="padding: 20px;">
    @csrf
    <table style="width: 100%; border-spacing: 0 12px;">
      <tr>
        <td style="width: 160px; font-weight: bold;">Student ID:</td>
        <td>
          <input type="text" name="student_id" value="{{ old('student_id') }}" placeholder="1234567890" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Registration Number:</td>
        <td>
          <input type="text" placeholder="1234567890" name="registration_number" value="{{ old('registration_number') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Date of Birth:</td>
        <td>
          <!-- Text field for datepicker -->
          <input type="text" name="dob" id="dob" value="{{ old('dob') }}" placeholder="DD-MM-YYYY" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <button type="submit" style="width: 100%; padding: 12px; background-color:#E64A19; color: white; font-weight: bold; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">VERIFY</button>
        </td>
      </tr>
    </table>
  </form>
</div>
@endsection