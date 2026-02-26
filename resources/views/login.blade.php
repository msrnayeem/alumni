
@extends('layouts.master')

@section('content')

<div style="max-width: 600px; margin: 40px auto; font-family: Arial, sans-serif; border: 1px solid #ddd; border-radius: 4px;">
  <div style="background-color: #f1f3f5; padding: 12px 20px; border-bottom: 1px solid #ccc; font-weight: bold; font-size: 16px;">
    Graduate Login
  </div>

  
  <form method="post" action="" style="padding: 20px;">
    <table style="width: 100%; border-spacing: 0 12px;">
      <tr>
        <td style="width: 160px; font-weight: bold;">Username:</td>
        <td>
          <input type="text" name="username" value="" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Password:</td>
        <td>
          <input type="password" name="password" placeholder="Your Password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <button type="submit" style="width: 100%; padding: 12px; background-color: #275cab; color: white; font-weight: bold; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Login</button>
        </td>
      </tr>
    </table>
  </form>
</div>

@endsection
