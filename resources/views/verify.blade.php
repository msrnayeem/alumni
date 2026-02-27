@extends('layouts.master')

@section('content')


<!-- Marquee notice -->
<div class="marquee-container">
  <div class="marquee">
    This is the only official website authorized by South Asia University Bangladesh for online certificate verification.
  </div>
</div>

</body>
</html>
<style>
  .profile-container { max-width: 720px; margin: 30px auto; font-family: Arial, sans-serif; border: 1px solid #ddd; border-radius: 6px; overflow: hidden; }
  .profile-container img.photo { width: 140px; height: 140px; object-fit: cover; border-radius: 4px; border: 1px solid #ccc; }
  .profile-header { display:flex; gap:16px; align-items:center; padding:16px; background:#f8f9fa; border-bottom:1px solid #eee; }
  .profile-header h2 { margin:0; font-size:22px; }
  .profile-details { padding:16px; }
  .profile-details table { width:100%; border-collapse:collapse; }
  .profile-details td { padding:8px 6px; border-bottom:1px solid #f0f0f0; }
  .profile-details .label { width:260px; font-weight:bold; color:#333; }
  .footer { padding:12px 16px; text-align:center; font-size:13px; color:#666; background:#fafafa; }
  .signature-wrap { padding:10px 16px 0 16px; }
  .signature-wrap img { max-width: 220px; display:block; }
  .signature-caption { font-size:12px; color:#555; margin-top:4px; }
</style>

<div class="profile-container">
  <div class="profile-header">
    <img class="photo" src="/profile.jpeg" alt="Student Photo">
    <div>
      <h2>MD EZAZ AHMMED</h2>
              <div><strong>SESSION:</strong> Spring 2019 - Spring 2023</div>
          </div>
  </div>

      <div class="signature-wrap">
      <img src="/signature.jpeg" alt="Signature">
      <div class="signature-caption">SIGNATURE</div>
    </div>
  
  <div class="profile-details">
    <table>
      <tr><td class="label">STUDENT ID:</td><td class="value">1814793124</td></tr><tr><td class="label">REGISTRATION NUMBER:</td><td class="value">33745724</td></tr><tr><td class="label">PROGRAM:</td><td class="value">BACHELOR OF BUSINESS ADMINISTRATION (BBA)</td></tr><tr><td class="label">MAJOR SUBJECT 1:</td><td class="value">ACCOUNTING INFORMATION SYSTEM</td></tr><tr><td class="label">CGPA:</td><td class="value">3.50</td></tr><tr><td class="label">ENROLMENT SEMESTER:</td><td class="value">Spring 2019</td></tr><tr><td class="label">PASSING YEAR:</td><td class="value">Spring 2023</td></tr><tr><td class="label">RESULT PUBLICATION&#039;S DATE:</td><td class="value">21ST MARCH 2023</td></tr><tr><td class="label">COMPLETED CREDIT:</td><td class="value">126</td></tr><tr><td class="label">CERTIFICATE SERIAL:</td><td class="value">04322</td></tr><tr><td class="label">CURRENT STATUS:</td><td class="value">GRADUATED</td></tr><tr><td class="label">FATHER&#039;S NAME:</td><td class="value">MD REZAUL HAQUE</td></tr><tr><td class="label">MOTHER&#039;S NAME:</td><td class="value">MST ROMELA KHATUN</td></tr><tr><td class="label">GENDER:</td><td class="value">MALE</td></tr><tr><td class="label">ADDRESS:</td><td class="value">HOSENPUR, BHERAMARA, JOGOSHWAR-7040, KUSHTIA</td></tr><tr><td class="label">DATE OF BIRTH:</td><td class="value">22ND JUNE 1998</td></tr>    </table>
  </div>

  <div class="footer">
    &copy; 2026 UNIVERSITY OF SOUTH ASIA. ALL RIGHTS RESERVED.
  </div>
</div>
@endsection
